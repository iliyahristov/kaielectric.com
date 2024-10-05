<?php

include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataSpecifUpload extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('data/data_upload');

		$this->document->setTitle($this->language->get('heading_title_specif'));		

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

    if( isset( $this->error['specif'] ) ){
      $data['error_specif'] = $this->error['specif'];
    }

    $data['barcode']  = '';
    $data['from_row'] = '';
    $data['to_row']   = '';    
    $data['specif']   = '';

    if( !empty( $post_data ) ){
      //set populate form fields
      if( !empty( $post_data['barcode'] ) ){ $data['barcode']   = $post_data['barcode']; }
      if( !empty( $post_data['from_row'] ) ){ $data['from_row'] = $post_data['from_row']; }
      if( !empty( $post_data['to_row'] ) ){ $data['to_row']     = $post_data['to_row']; }
      if( !empty( $post_data['specif'] ) ){ $data['specif']   = $post_data['specif']; }
    }

    $data['success'] = '';
    if( isset( $post_data['success'] ) ){ 
      $data['success'] = $post_data['success']; 
    }
		$data['action'] = $this->url->link('data/specif_upload/add', 'user_token=' . $this->session->data['user_token'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('data/data_upload_specif_form', $data));

	}

	public function add(){

    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
		
		$barcode_col = $_POST['data']['barcode'];
		$specif_col  = $_POST['data']['specif'];
		
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

     	$updated = 0;
     	$this->load->model('data/specif_upload');	

    	for ($row = $firstRow; $row <= $lastRow; $row++) {
    			$data = [];
    			if( isset( $barcode_col ) ) {
    					if( !empty( $barcode_col) ){
    						$data['barcode'] = strip_tags( $worksheet->getCell( $barcode_col.$row)->getValue() );
    						//at least one is expected
    					if( !empty( $specif_col ) ) {
    						$data['specif'] = strip_tags( $worksheet->getCell( $specif_col.$row)->getValue() ) ;
    					}
		
    					$result = $this->model_data_specif_upload->update_product_specif( $data );

    					if( $result ){
    						$updated++;
    					}
    				}
    			}    			
    	} 
    		
        $res['success'] = 'Обновихте/добавихте спесификации/.pdf/ на ' . $updated . ' продукта.';
        $this->upload_form( $res );  
    } else {
    	$this->upload_form( $_POST['data'] );
    }		
	}

  protected function validateForm() {
    
    if (!$this->user->hasPermission('modify', 'data/specif_upload')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    //validate barcode exists
    if( empty( $_POST['data']['barcode'] ) ){ $this->error['barcode']   = 'Въведете колона за баркод!';}
    
    //validate picture exists
    if( empty( $_POST['data']['specif'] ) ){ $this->error['specif']     = 'Въведете колона за спесификация!';}
  
    //validate file not empty
    if( $_FILES['data_file']['size'] == 0 ){ $this->error['data_file'] = 'Изберете валиден файл!'; }      

    return !$this->error;
  }

	

	
}