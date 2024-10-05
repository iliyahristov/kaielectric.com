<?php
class ModelDataSpecifUpload extends Model {
	
	public function update_product_specif( $data ){
		// Initialize the cURL session
		//	TO DO delete file if exists
		
		$ch = curl_init( $data['specif'] );
	
        // file will be save
		$dir = DIR_IMAGE . 'catalog/product_specif/';

// Use basename() function to return
// the base name of file 
		$file_name = $data['barcode'] . '_specif.pdf';

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

		fclose($fp);
		$db_name = 'catalog/product_specif/' . $file_name;
		//save as product pic in db - catalog/products/SDN5600121.jpg
		$sql = "UPDATE " . DB_PREFIX . "product SET ";
		$sql .= "specif='" . $db_name . "' WHERE ean='" . $data['barcode'] . "'";
		
		$this->db->query( $sql );

		return true;
	}
}