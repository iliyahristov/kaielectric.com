<?php
class ModelDataRelatedProductsUpload extends Model {
	
	public function update_product_info( $data ){
		//look for product by
		$main = $data['main'];
		$main_search = $data['main_search'];
		$related = $data['related'];

		$main_product = $this->db->query( "SELECT product_id FROM `" . DB_PREFIX . "product` WHERE ". $main ." = '" . $main_search . "'" );

		if( $main_product->num_rows ){
			$main_id = $main_product->row['product_id'];
		
			//delete up to now related products
			$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related` WHERE `product_id` =". $main_id );
			$valid = false;

			foreach( $data['related_products'] as $rp){				
				//get the related roduct
				$related_res = $this->db->query( "SELECT product_id FROM `" . DB_PREFIX . "product` WHERE ". $related ." = '" . $rp . "'" );
			
				if( $related_res->num_rows){
					//if such related product - set flag to true
					$valid = true;
					$related_id = $related_res->row['product_id'];

					if( !$check_existing->num_rows ){
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_related (`product_id`, `related_id`) VALUES ('". (int)$main_id ."', '" . (int)$related_id . "')");
					}
				}				
			}
			//add related products - check that there are valid related products
			//return true if flag is true - at least one related product added
			if( $valid ){
				return true;
			} else {
				return false;
			}
			
		} else {
			return false;
		}		

	}
}