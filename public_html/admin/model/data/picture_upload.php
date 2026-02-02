<?php

class ModelDataPictureUpload extends Model
{
    /**
     * Sanitize a user-provided filename (base name, without extension) to something safe.
     * Keeps latin letters/numbers/underscore/dash. Everything else becomes underscore.
     *
     * If the result becomes empty (e.g. name is only Cyrillic), caller should fall back
     * to a barcode-based name.
     *
     * @param string $name
     * @return string
     */
    private function sanitizeFileBase($name)
    {
        $name = (string)$name;
        $name = trim($name);

        if ($name === '') {
            return '';
        }

        // If user provided "file.jpg" - keep only the base name.
        $name = pathinfo($name, PATHINFO_FILENAME);

        // Replace path separators just in case.
        $name = str_replace(array('/', '\\'), '_', $name);

        // Keep only safe characters.
        $name = preg_replace('/[^A-Za-z0-9_-]+/', '_', $name);
        $name = preg_replace('/_+/', '_', $name);
        $name = trim($name, '_-');

        return $name;
    }

    /**
     * Download remote image and save it in catalog/products with deterministic filename.
     *
     * @param string      $url
     * @param string      $barcode
     * @param int         $position   0 for main image; 1..N for additional images
     * @param string|null $desired    Desired base filename from spreadsheet (optional)
     * @return string|false           Relative image path (catalog/...) or false on error
     */
    private function downloadAndSaveImage($url, $barcode, $position, $desired = null)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        // Determine extension based on remote content.
        // Note: exif_imagetype() can return false; we fall back to .jpg.
        $type = @exif_imagetype($url);

        switch ($type) {
            case IMAGETYPE_GIF:
                $extension = '.gif';
                break;
            case IMAGETYPE_JPEG:
                $extension = '.jpg';
                break;
            case IMAGETYPE_PNG:
                $extension = '.png';
                break;
            case IMAGETYPE_WEBP:
                $extension = '.webp';
                break;
            default:
                $extension = '.jpg';
                break;
        }

        $dir = DIR_IMAGE . 'catalog/products/';

        // Build filename.
        $base = $this->sanitizeFileBase($desired);

        if ($base === '') {
            // Backward compatible fallback.
            $base = $barcode . '_' . (int)$position;
        } else {
            // If there are multiple images in a row, suffix by position to keep names unique.
            if ((int)$position > 0) {
                $base .= '_' . (int)$position;
            }
        }

        $file_name = $base . $extension;
        $save_file_loc = $dir . $file_name;

        // Ensure directory exists (in case of a new install).
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        $fp = fopen($save_file_loc, 'wb');
        if (!$fp) {
            return false;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        curl_exec($ch);

        if (curl_errno($ch)) {
            fclose($fp);
            curl_close($ch);
            @unlink($save_file_loc);
            return false;
        }

        curl_close($ch);
        fclose($fp);

        if (!file_exists($save_file_loc) || filesize($save_file_loc) == 0) {
            @unlink($save_file_loc);
            return false;
        }

        return 'catalog/products/' . $file_name;
    }

    public function add_picture($data, $position)
    {
        $desired = isset($data['picture_name']) ? $data['picture_name'] : null;
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], (int)$position, $desired);
        if (!$image_path) {
            return false;
        }

        $sql = "INSERT INTO " . DB_PREFIX . "product_image (product_id, image, sort_order) ";
        $sql .= "SELECT p.product_id, '" . $this->db->escape($image_path) . "', '" . (int)$position . "' ";
        $sql .= "FROM " . DB_PREFIX . "product p WHERE p.ean='" . $this->db->escape($data['barcode']) . "'";

        $this->db->query($sql);

        return true;
    }

    public function update_product_picture($data)
    {
        $desired = isset($data['picture_name']) ? $data['picture_name'] : null;
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], 0, $desired);
        if (!$image_path) {
            return false;
        }

        $sql = "UPDATE " . DB_PREFIX . "product SET image='" . $this->db->escape($image_path) . "' ";
        $sql .= "WHERE ean='" . $this->db->escape($data['barcode']) . "'";
        $this->db->query($sql);

        return true;
    }

    public function delete_picture($data)
    {
        $sql = "UPDATE " . DB_PREFIX . "product SET image = '' WHERE ean='" . $this->db->escape($data['barcode']) . "'";
        $this->db->query($sql);

        $sql = "DELETE FROM " . DB_PREFIX . "product_image ";
        $sql .= "WHERE product_id = (SELECT DISTINCT p.product_id FROM " . DB_PREFIX . "product p WHERE p.ean='" . $this->db->escape($data['barcode']) . "')";
        $this->db->query($sql);

        return true;
    }
}
