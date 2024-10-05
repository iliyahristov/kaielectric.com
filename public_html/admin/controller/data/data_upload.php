<?php
include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataDataUpload extends Controller {

	private $error = array();

	public function index() {
		$this->load->language('data/data_upload');

		$this->document->setTitle($this->language->get('heading_title'));		

		$this->upload_form([]);		
	}

	public function upload_form( $post_data ){    
    $data = [];

    if( !empty( $this->error ) ){
      $data['error_warning'] = 'Прегледайте внимателно формата за грешки!';
    }
    if( isset( $this->error['barcode'])){
      $data['error_barcode'] = $this->error['barcode'];
    }

    if( isset( $this->error['data_file'])){
      $data['error_data_file'] = $this->error['data_file'];
    }

    $data['barcode']  = '';
    $data['from_row'] = '';
    $data['to_row']   = '';
    $data['jan']      = '';
    $data['width']    = '';
    $data['length']   = '';
    $data['height']   = '';
    $data['weight']   = '';

    if( !empty( $post_data ) ){
      //set populate form fields
      if( !empty( $post_data['barcode'] ) ){ $data['barcode']  = $post_data['barcode']; }
      if( !empty( $post_data['from_row'] ) ){ $data['from_row'] = $post_data['from_row']; }
      if( !empty( $post_data['to_row'] ) ){ $data['to_row']   = $post_data['to_row']; }
      if( !empty( $post_data['jan'] ) ){ $data['jan']         = $post_data['jan']; }
      if( !empty( $post_data['width'] ) ){ $data['width']    = $post_data['width']; }
      if( !empty( $post_data['length'] ) ){ $data['length']   = $post_data['length']; }
      if( !empty( $post_data['height'] ) ){ $data['height']   = $post_data['height']; }
      if( !empty( $post_data['weight'] ) ){ $data['weight']   = $post_data['weight']; }
    }

    $data['success'] = '';
    if( isset( $post_data['success'] ) ){ 
      $data['success'] = $post_data['success']; 

    }

		$data['action'] = $this->url->link('data/data_upload/add', 'user_token=' . $this->session->data['user_token'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');   
   
		$this->response->setOutput($this->load->view('data/data_upload_form', $data));

	}

	public function add(){		
		
    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

		  $barcode_col = $_POST['data']['barcode'];
		  $tmpfname = $_FILES["data_file"]["tmp_name"];

		  $excelReader = PHPExcel_IOFactory::createReaderForFile( $tmpfname );
      $excelObj = $excelReader->load( $tmpfname );
      $worksheet = $excelObj->getSheet(0);

      if( !empty( $_POST['data']['from_row'] ) ) {
      	$firstRow = $_POST['data']['from_row'];
      } else {
      	$firstRow = 3;
      }

      if( !empty( $_POST['data']['to_row'] ) ) {
      	$lastRow = $_POST['data']['to_row'];
      } else {
      	$lastRow = $worksheet->getHighestRow();
      }
      	//set cols for data
    	if( !empty( $_POST['data']['jan'] ) ){
    		$jan_col = $_POST['data']['jan'];
    	}
      if( !empty( $_POST['data']['length'] ) ){
        $length_col = $_POST['data']['length'];
      }
    	if( !empty( $_POST['data']['width'] ) ){
    		$width_col = $_POST['data']['width'];
    	}
    	if( !empty( $_POST['data']['height'] ) ){
    		$height_col = $_POST['data']['height'];
    	}
      	if( !empty( $_POST['data']['weight'] ) ){
    		$weight_col = $_POST['data']['weight'];
    	}

     	$updated = 0;
     	$this->load->model('data/data_upload');	

      for ($row = $firstRow; $row <= $lastRow; $row++) {
    		$data = [];
    		if( isset( $barcode_col ) ) {
    			if( !empty( $barcode_col) ){
            $data['barcode'] = strip_tags( $worksheet->getCell( $barcode_col.$row)->getValue() );
    				$data['jan'] = strip_tags( $worksheet->getCell( $jan_col.$row)->getValue() );
    				//at least one is expected
    			if( isset( $length_col ) ) {
    				$l = explode( ' ', strip_tags( $worksheet->getCell( $length_col.$row)->getValue() ) );
    				$data['length'] = $l[0];
    			}
    			if( isset( $width_col ) ) {
    				$w = explode( ' ', strip_tags( $worksheet->getCell( $width_col.$row)->getValue() ) );
    				$data['width'] = $w[0];
    			}
    			if( isset( $height_col ) ) {
    				$h = explode( ' ', (strip_tags( $worksheet->getCell( $height_col.$row)->getValue() )));
    				$data['height'] = $h[0];
    			}
    			if( isset( $weight_col ) ) {
    				$wt = explode( ' ', strip_tags( $worksheet->getCell( $weight_col.$row)->getValue() ) );
    				$data['weight'] = $wt[0];
    			}
		
    			$result = $this->model_data_data_upload->update_product_info( $data );

    			if( $result ){
    				$updated++;
    			}
          
    		}
    	}	    			
    		
        	
    	} 
      $res['success'] = 'Обновихте ' . $updated . ' продукта.';//add num updated    
        
      $this->upload_form( $res );  
    } else {
      $this->upload_form( $_POST['data'] );//check errors are displayed
    }

    
	}

  protected function validateForm() {
    
    if (!$this->user->hasPermission('modify', 'data/data_upload')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    //validate barcode exists
    if( empty( $_POST['data']['barcode'] ) ){ $this->error['barcode']   = 'Въведете колона за баркод!';}
   
    //validate file not empty
    if( $_FILES['data_file']['size'] == 0 ){ $this->error['data_file'] = 'Изберете валиден файл!'; }      

    return !$this->error;
  }

	
}