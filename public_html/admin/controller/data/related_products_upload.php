<?php
include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataRelatedProductsUpload extends Controller {

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
    if( isset( $this->error['main'])){
      $data['main'] = $this->error['main'];
    }
    if( isset( $this->error['related'])){
      $data['related'] = $this->error['related'];
    }
    if( isset( $this->error['col_from'])){
      $data['col_from'] = $this->error['col_from'];
    }
    if( isset( $this->error['col_to'])){
      $data['col_to'] = $this->error['col_to'];
    }
    if( isset( $this->error['row_from'])){
      $data['row_from'] = $this->error['row_from'];
    }
    if( isset( $this->error['row_to'])){
      $data['row_to'] = $this->error['row_to'];
    }

    if( isset( $this->error['data_file'])){
      $data['error_data_file'] = $this->error['data_file'];
    }

    $data['main']  = '';
    $data['barcode']  = '';
    $data['related'] = '';
    $data['col_from']   = '';
    $data['col_to']   = '';
    $data['row_to']   = '';
    $data['row_from']   = '';

    if( !empty( $post_data ) ){
      //set populate form fields
      if( !empty( $post_data['main'] ) ){ $data['main']  = $post_data['main']; }
      if( !empty( $post_data['barcode'] ) ){ $data['barcode']  = $post_data['barcode']; }
      if( !empty( $post_data['related'] ) ){ $data['related']  = $post_data['related']; }
      if( !empty( $post_data['col_from'] ) ){ $data['col_from']  = $post_data['col_from']; }
      if( !empty( $post_data['col_to'] ) ){ $data['col_to']  = $post_data['col_to']; }
      if( !empty( $post_data['row_to'] ) ){ $data['row_to']  = $post_data['row_to']; }
      if( !empty( $post_data['row_from'] ) ){ $data['row_from']  = $post_data['row_from']; }     
    }

    $data['success'] = '';
    if( isset( $post_data['success'] ) ){ 
      $data['success'] = $post_data['success']; 
    }

		$data['action'] = $this->url->link('data/related_products_upload/add', 'user_token=' . $this->session->data['user_token'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');   
   
		$this->response->setOutput($this->load->view('data/related_products_upload_form', $data));

	}

	public function add(){		
		
    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
		  //product is searched by
		 
      $main = $_POST['data']['main'];//ean or model
      $main_search = $_POST['data']['barcode'];
      $related = $_POST['data']['related'];//ean or model
      $col_from = $_POST['data']['col_from'];//col from
      $col_to = $_POST['data']['col_to'];//col to
	       
      $row_from = $_POST['data']['row_from'];//col from
      $row_to = $_POST['data']['row_to'];//col to
      
   	  
      $tmpfname = $_FILES["data_file"]["tmp_name"];

		  $excelReader = PHPExcel_IOFactory::createReaderForFile( $tmpfname );
      $excelObj = $excelReader->load( $tmpfname );
      $worksheet = $excelObj->getSheet(0);
      

     	$updated = 0;
     	$this->load->model('data/related_products_upload');	
      $ind_from = PHPExcel_Cell::columnIndexFromString( $col_from );
      $ind_to = PHPExcel_Cell::columnIndexFromString( $col_to );
      
      for ($row = $row_from; $row <= $row_to; $row++) {
        
    		$data = [];
    		
        $data['main'] = $main;//model or ean
        $data['main_search'] = strip_tags( $worksheet->getCell( $main_search.$row)->getValue() );//value to search main product
        $data['related'] = $related;
        $data['related_products'] = [];

        for( $col = $ind_from - 1; $col < $ind_to; $col++ ){
         
          $cell = $worksheet->getCellByColumnAndRow( intval($col), intval($row) );
          
          $product = $cell->getValue(); 
          
          if( !empty( $product ) ){
            $data['related_products'][] = $product;//ean or model depends on main
          }
        }

       
        
    		$result = $this->model_data_related_products_upload->update_product_info( $data );

    		if( $result ){
    			$updated++;
    		}	
    	} 
      $res['success'] = 'Добавихте свързани продукти към ' . $updated . ' продукт(а).';//add num updated    
        
      $this->upload_form( $res );  
    } else {
      $this->upload_form( $_POST['data'] );//check errors are displayed
    }
	}

  protected function validateForm() {
    
    if (!$this->user->hasPermission('modify', 'data/related_products_upload')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }
    
    //main product
    if( empty( $_POST['data']['main'] ) ){ $this->error['main']   = 'Изберете баркод или код!';}

    //validate barcode exists
    if( empty( $_POST['data']['barcode'] ) ){ $this->error['barcode']   = 'Въведете колона за баркод/код!';}

    //related products are searched by
    if( empty( $_POST['data']['related'] ) ){ $this->error['related']   = 'Изберет баркод или код!';}

    //related products col from
    if( empty( $_POST['data']['col_from'] ) ){ $this->error['col_from']   = 'Попълнете колоната!';}

    //related products col to
    if( empty( $_POST['data']['col_to'] ) ){ $this->error['col_to']   = 'Попълнете колоната!';}

    //related products row to
    if( empty( $_POST['data']['row_to'] ) ){ $this->error['row_to']   = 'Попълнете колоната!';}

    //related products row from
    if( empty( $_POST['data']['row_from'] ) ){ $this->error['row_from']   = 'Попълнете колоната!';}
   
    //validate file not empty
    if( $_FILES['data_file']['size'] == 0 ){ $this->error['data_file'] = 'Изберете валиден файл!'; }      
    return !$this->error;
  }

	
}