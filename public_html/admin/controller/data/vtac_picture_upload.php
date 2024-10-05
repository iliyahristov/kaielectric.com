<?php

include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataVtacPictureUpload extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('data/data_upload');

		$this->document->setTitle($this->language->get('heading_title_vtac_picture'));		

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

    if( isset( $this->error['jan'])){
      $data['error_jan'] = $this->error['jan'];
    }

    if( isset( $this->error['data_file'])){
      $data['error_data_file'] = $this->error['data_file'];
    }

    if( isset( $this->error['picture'])){
      $data['error_picture'] = $this->error['picture'];
    }

    $data['barcode']  = '';
    $data['jan']  = '';
    $data['from_row'] = '';
    $data['to_row']   = '';   

    if( !empty( $post_data ) ){
      //set populate form fields
      if( !empty( $post_data['barcode'] ) ){ $data['barcode']   = $post_data['barcode']; }
      if( !empty( $post_data['jan'] ) ){ $data['jan']   = $post_data['jan']; }
      if( !empty( $post_data['from_row'] ) ){ $data['from_row'] = $post_data['from_row']; }
      if( !empty( $post_data['to_row'] ) ){ $data['to_row']     = $post_data['to_row']; }
    }

    $data['success'] = '';
    if( isset( $post_data['success'] ) ){ 
      $data['success'] = $post_data['success']; 

    }
		$data['action'] = $this->url->link('data/vtac_picture_upload/add', 'user_token=' . $this->session->data['user_token'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('data/data_upload_vtac_pictures_form', $data));

	}

	public function add(){   
    

     	$updated = 0;
     	$this->load->model('data/vtac_picture_upload');	    	
		
    	$result = $this->model_data_vtac_picture_upload->update_product_picture();    					
    		
      $res['success'] = 'Свързахте' . $updated . ' снимки с продукти.';
      $this->upload_form( $res );  
    
	}

  protected function validateForm() {
    
    if (!$this->user->hasPermission('modify', 'data/vtac_picture_upload')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }

    //validate barcode exists
    if( empty( $_POST['data']['barcode'] ) ){ $this->error['barcode']   = 'Въведете колона за баркод!';}
    
    //validate jan exists
    if( empty( $_POST['data']['jan'] ) ){ $this->error['jan']   = 'Въведете колона за код на производител!';}
  
    //validate file not empty
    if( $_FILES['data_file']['size'] == 0 ){ $this->error['data_file'] = 'Изберете валиден файл!'; }      

    return !$this->error;
  }

	

	
}