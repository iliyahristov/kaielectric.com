<?php
class ModelDataVtacPictureUpload extends Model {
	// 2090 in file 
	// 2030 in the db
	// 1710 pictures 
	// 3236 additional
	
	public function update_product_picture(){
		
		$files =  scandir(DIR_IMAGE. 'catalog/products_vtac10');
		$updates = 1;
		foreach( $files as $f ){
			$db_name = "catalog/products_vtac10/$f";

			$is_additional = false;
			$base = explode('.', $f);
			$products_arr = explode( '-', $base[0] );
			
			//check this is an additional pictures
			$count = count( $products_arr );
			// var_dump( $base );
			if( !empty( $base[0] ) ){
			if( $count > 1 ){			
				if( $products_arr[$count-1] > 0 && $products_arr[$count-1] < 10 ){
					foreach( $products_arr as $pad ){
						//pictures go as additional
						//get product id					
						$query = $this->db->query("SELECT product_id FROM `" . DB_PREFIX . "product` WHERE jan = '" . $pad . "'");
						$product = $query->row;
						if( !empty( $product ) ){
							$product_id = $product['product_id'];
							$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_image` WHERE product_id = '" . $product_id . "' AND image='". $db_name ."'");
							if( empty( $query->row ) ){
								$this->db->query("INSERT INTO `" . DB_PREFIX . "product_image` SET product_id = '" . (int)$product_id . "', image = '" . $db_name . "'");
								$updates++;
							}
						
						}
						
						//check fro combination of product id and image name
						//add new image
					}

				} else {
					//pictures go as main
					foreach( $products_arr as $p ){
						if( !empty( $p ) ){
						// $db_name = "catalog/products_vtac/$f";
						// save as product pic in db - catalog/products/SDN5600121.jpg
						$sql = "UPDATE " . DB_PREFIX . "product SET ";
						$sql .= "image='" . $db_name . "' WHERE jan='" . $p . "'";
					
						$this->db->query( $sql );
						$updates++;
					}

					}
				}
			} else {

					//one picture to add in db
					// $db_name = "catalog/products_vtac/$f";
					// save as product pic in db - catalog/products/SDN5600121.jpg
					$sql = "UPDATE " . DB_PREFIX . "product SET ";
					$sql .= "image='" . $db_name . "' WHERE jan='" . $base[0] . "'";
				
					$this->db->query( $sql );
					$updates++;
				}
			}	




		}
		return true;
	}	
}
