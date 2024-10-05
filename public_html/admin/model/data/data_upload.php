<?php
class ModelDataDataUpload extends Model {
	
	public function update_product_info( $data ){
		$flag = false;

		if( !empty( $data ) ){
			if( !empty( $data['barcode'] ) 
				&& ( isset( $data['width'] ) 
					|| isset( $data['length'] ) 
					|| isset( $data['height'] ) 
					|| isset( $data['weight'] )
					|| isset( $data['jan'] ) ) ){
				
				$sql = "UPDATE " . DB_PREFIX . "product SET ";
				if ( isset( $data['jan'] ) ){
					$sql .= "jan ='" . $data['jan'] . "'";
					$flag = true;
				}
				if ( isset( $data['width'] ) ){
					$sql .= ", width ='" . $data['width'] . "'";
					$flag = true;
				}
				if( isset( $data['length'] ) ) {
					if( $flag ){
						$sql .= ", length = '" . $data['length'] . "'";	
					}else {
						$sql .= " length = '" . $data['length'] . "'";	
					}
					$flag = true;							
				}
				if( isset( $data['height'] ) ){
					if( $flag ){
						$sql .= ", height = '" . $data['height'] . "'";	
					}else {
						$sql .= " height = '" . $data['height'] . "'";	
					}
					$flag = true;		
				}
				if( isset( $data['weight'] ) ){
					if( $flag ){
						$sql .= ", weight = '" . $data['weight'] . "'";	
					}else {
						$sql .= " weight = '" . $data['weight'] . "'";	
					}		
				}
			
				$sql .= " WHERE ean = '" . $data['barcode'] . "'";

				$this->db->query( $sql );
	
				return true;
			}

		}
		
		
	}

	
}