<?php

class ModelDataPictureUpload extends Model
{
    /**
     * Sanitize a user-provided filename (base name, without extension) to something safe.
     */
    private function sanitizeFileBase($name)
    {
        $name = (string)$name;
        $name = trim($name);

        if ($name === '') {
            return '';
        }

        $name = pathinfo($name, PATHINFO_FILENAME);
        $name = str_replace(array('/', '\\'), '_', $name);
        $name = preg_replace('/[^A-Za-z0-9_-]+/', '_', $name);
        $name = preg_replace('/_+/', '_', $name);
        $name = trim($name, '_-');

        return $name;
    }

    /**
     * Намира product_id по баркод или model (с и без водещи нули)
     */
    private function findProductId($barcode)
    {
        if (empty($barcode)) {
            return false;
        }

        $barcode_trimmed = ltrim($barcode, '0');

        $query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product WHERE `ean` = '" . $this->db->escape($barcode) . "' OR `model` = '" . $this->db->escape($barcode) . "' OR `model` = '" . $this->db->escape($barcode_trimmed) . "' LIMIT 1");

        if ($query->num_rows) {
            return (int)$query->row['product_id'];
        }

        return false;
    }

    /**
     * Download remote image and save it in catalog/products with deterministic filename.
     */
    private function downloadAndSaveImage($url, $barcode, $position, $desired = null)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

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

        $base = $this->sanitizeFileBase($desired);

        if ($base === '') {
            $base = $barcode . '_' . (int)$position;
        } else {
            if ((int)$position > 0) {
                $base .= '_' . (int)$position;
            }
        }

        $file_name = $base . $extension;
        $save_file_loc = $dir . $file_name;

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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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
        $product_id = $this->findProductId($data['barcode']);
        if (!$product_id) {
            return false;
        }

        $desired = isset($data['picture_name']) ? $data['picture_name'] : null;
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], (int)$position, $desired);
        if (!$image_path) {
            return false;
        }

        $sql = "INSERT INTO " . DB_PREFIX . "product_image (product_id, image, sort_order) VALUES ('" . (int)$product_id . "', '" . $this->db->escape($image_path) . "', '" . (int)$position . "')";

        $this->db->query($sql);

        return true;
    }

    public function update_product_picture($data)
    {
        $product_id = $this->findProductId($data['barcode']);
        if (!$product_id) {
            return false;
        }

        $desired = isset($data['picture_name']) ? $data['picture_name'] : null;
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], 0, $desired);
        if (!$image_path) {
            return false;
        }

        $sql = "UPDATE " . DB_PREFIX . "product SET image='" . $this->db->escape($image_path) . "' WHERE product_id='" . (int)$product_id . "'";
        $this->db->query($sql);

        return true;
    }

    public function delete_picture($data)
    {
        $product_id = $this->findProductId($data['barcode']);
        if (!$product_id) {
            return false;
        }

        $sql = "UPDATE " . DB_PREFIX . "product SET image = '' WHERE product_id='" . (int)$product_id . "'";
        $this->db->query($sql);

        $sql = "DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'";
        $this->db->query($sql);

        return true;
    }
}
