<?php
include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataRelatedModuleName extends Controller {

	private $error = array();

	public function index() {
		$this->load->language('data/data_upload');

		$this->document->setTitle("Название модул свързани продукти");		

		$this->getForm();		
	}

	public function getForm( $res = [] ){    
    
    $this->load->model('catalog/category');

      //join with the new table
    
    $data['categories'] = $this->model_catalog_category->getCategoriesByParent();
    $data['module_names'] = $this->model_catalog_category->getRelatedModuleNameByCategory();
    if( !empty( $res ) ){
      if( isset( $res['success'] ) ){
        $data['success'] = $res['success'];
      }
    }

		$data['action'] = $this->url->link('data/related_module_name/add', 'user_token=' . $this->session->data['user_token'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');   
   
		$this->response->setOutput($this->load->view('data/related_module_name', $data));

	}

	public function add(){		
		
    if ( ( $this->request->server['REQUEST_METHOD'] == 'POST' ) ) {

      $this->load->model('catalog/category');
      		  
      if( !empty( $_POST['data'] ) ) {

        $result = $this->model_catalog_category->addRelatedModulenamesByCategory( $_POST['data'] );
      
        $res['success'] = 'Променихте имена на модул за свързани продукти според категорията на продуктите.';//add num updated    
        
        $this->getForm( $res );  
      }

    }
	}  
}