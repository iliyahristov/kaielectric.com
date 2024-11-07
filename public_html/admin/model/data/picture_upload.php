<?php

class ModelDataPictureUpload extends Model
{
    private function downloadAndSaveImage($url, $barcode, $position)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        $ext = exif_imagetype($url);

        switch ($ext) {
            case 1:
                $extension = '.gif';
                break;
            case 2:
                $extension = '.jpeg';
                break;
            case 3:
                $extension = '.png';
                break;
            default:
                $extension = '.jpg';
                break;
        }

        $dir = DIR_IMAGE . 'catalog/products/';
        $file_name = $barcode . '_' . $position . '_' . $ext . $extension;
        $save_file_loc = $dir . $file_name;

        $fp = fopen($save_file_loc, 'wb');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);

        if (curl_errno($ch)) {
            fclose($fp);
            curl_close($ch);
            return false;
        }

        curl_close($ch);
        fclose($fp);

        if (filesize($save_file_loc) == 0) {
            unlink($save_file_loc);
            return false;
        }

        return 'catalog/products/' . $file_name;
    }

    public function add_picture($data, $position)
    {
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], $position);
        if (!$image_path) {
            return false;
        }

        $sql = "INSERT INTO " . DB_PREFIX . "product_image (product_id, image, sort_order) ";
        $sql .= "SELECT p.product_id, '" . $image_path . "', '" . $position . "' ";
        $sql .= "FROM " . DB_PREFIX . "product p WHERE p.ean='" . $data['barcode'] . "'";

        $this->db->query($sql);

        return true;
    }

    public function update_product_picture($data)
    {
        $image_path = $this->downloadAndSaveImage($data['picture'], $data['barcode'], 0);
        if (!$image_path) {
            return false;
        }

        $sql = "UPDATE " . DB_PREFIX . "product SET image='" . $image_path . "' WHERE ean='" . $data['barcode'] . "'";
        $this->db->query($sql);

        return true;
    }

    public function delete_picture($data)
    {
        $sql = "UPDATE "  . DB_PREFIX . "product SET image = '' WHERE ean='" . $data['barcode'] . "'";
        $this->db->query($sql);

        $sql = "DELETE FROM " . DB_PREFIX . "product_image ";
        $sql .= "WHERE product_id = (SELECT DISTINCT p.product_id FROM " . DB_PREFIX . "product p WHERE p.ean='" . $data['barcode'] . "')";
        $this->db->query($sql);

        return true;
    }
}

