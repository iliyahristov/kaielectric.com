<?php

class ModelDataPictureUpload extends Model
{

    public function add_picture($data, $position)
    {

        $ext = exif_imagetype($data['picture']);

        switch ($ext) {
            case 1 :
                // IMAGETYPE_GIF
                $extension = '.gif';
                break;
            case 2 :
                // IMAGETYPE_JPEG
                $extension = '.jpeg';
                break;

            case 3 :
                // IMAGETYPE_PNG
                $extension = '.png';
                break;

            default:
                $extension = '.jpg';
                break;
        }
        
        
        $dir = DIR_IMAGE . 'catalog/products/';

        $file_name = $data['barcode'] . '_' . $position.'_'.$ext . $extension;

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');
        $ch = curl_init($data['picture']);
        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);
        // Close file

        fclose($fp);

        
        $image_path = 'catalog/products/' . $file_name;
        $sql = "INSERT INTO " . DB_PREFIX . "product_image (product_id, image, sort_order) ";
        $sql .= "SELECT p.product_id, '" . $image_path . "', '". $position ."'";
        $sql .= "FROM " . DB_PREFIX . "product p WHERE p.ean='" . $data['barcode'] . "'";

        $this->db->query($sql);

        return true;
    }

    public function update_product_picture($data)
    {
        $ext = exif_imagetype($data['picture']);

        switch ($ext) {
            case 1 :
                // IMAGETYPE_GIF
                $extension = '.gif';
                break;
            case 2 :
                // IMAGETYPE_JPEG
                $extension = '.jpeg';
                break;

            case 3 :
                // IMAGETYPE_PNG
                $extension = '.png';
                break;

            default:
                $extension = '.jpg';
                break;
        }

        $dir = DIR_IMAGE . 'catalog/products/';

        $file_name = $data['barcode'] . '_' .$ext .  $extension;

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');
        $ch = curl_init($data['picture']);
        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);
        // Close file

        fclose($fp);
        
        /*
        $ch = curl_init($data['picture']);
        $dir = DIR_IMAGE . 'catalog/products/';

        $file_name = $data['barcode'] . $extension;

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);

        // Close file

        fclose($fp);*/
        $db_name = 'catalog/products/' . $file_name;
        $sql = "UPDATE " . DB_PREFIX . "product SET ";
        $sql .= "image='" . $db_name . "' WHERE ean='" . $data['barcode'] . "'";

        $this->db->query($sql);

        return true;
    }

    public function delete_picture($data){
        $sql = "DELETE FROM " . DB_PREFIX . "product_image ";
        $sql .= "WHERE product_id = (SELECT DISTINCT p.product_id ";
        $sql .= "FROM " . DB_PREFIX . "product p WHERE p.ean='" . $data['barcode'] . "')";

        $this->db->query($sql);

        return true;
    }

}