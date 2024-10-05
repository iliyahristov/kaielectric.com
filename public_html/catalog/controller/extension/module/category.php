<?php
class ControllerExtensionModuleCategory extends Controller {
	public function index() {
		$this->load->language('extension/module/category');
		
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = [];

		//module categories in categories pages
		if (isset($this->request->get['path'])) {
			
			$data['parent'] = '0';

			if (isset($this->request->get['path'])) {
				$parts = explode('_', (string)$this->request->get['path']);
			} else {
				$parts = array();
			}
		//xml
			$full_path = $this->request->get['path'];

			if (isset($parts[0])) {

				$count = count( $parts );
				$data['category_id'] = $parts[$count-1];
			} else {
				$data['category_id'] = 0;
			}

			if (isset($parts[1])) {
				$data['child_id'] = $parts[1];
			} else {
				$data['child_id'] = 0;
			}

			$data['child_id'] = 0;				

			$categories = $this->model_catalog_category->getCategories( $data['category_id'] );

			foreach ($categories as $category) {
				$children_data = array();				

				$filter_data = array(
					'filter_category_id'  => $category['category_id'],
					'filter_sub_category' => true
				);

				$data['categories'][] = array(
					'category_id' => $category['category_id'],
					'name'        => $category['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'children'    => [],
					//'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
					'href'        => $this->url->link('product/category', 'path=' . $full_path . '_' . $category['category_id'])
				);
			}//end foreach categories
		}//end if path id
		elseif ( isset( $this->request->get['manufacturer_id'] ) ) {

			$man_id = $this->request->get['manufacturer_id'];

			if( isset( $this->request->get['parent'] ) ){
				//categories with parent id
				$parent_id = $this->request->get['parent'];
			} else {
				$parent_id = 0;
			}
		//if set manufacturer id
			$man['categories'] = array();

			//TO DO - ADD CAT ID TO REQUEST FROM HERE + MAN ID
			$categories = $this->model_catalog_category->getManCategories( $man_id, $parent_id );


			foreach ( $categories as $category ) {
				
				$data['categories'][] = array(
					'category_id' => $category['category_id'],
					'name'        => $category['name'],
					'children'    => [],
					'href'        => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $man_id . '&parent=' . $category['category_id'] ),
					// 'href'        => $this->url->link('product/category', 'path=' . $full_path . '_' . $category['category_id'])
				);
			
			}//end foreach categories
								
		} elseif( isset( $this->request->get['search']) ){
			$parent = 0;
			if( isset( $this->request->get['category_id'] ) ){
				$parent = $this->request->get['category_id'];
			}
			//should serach in name, model, jan
			$search = $this->request->get['search'];

			$categories = $this->model_catalog_category->getSearchCategories( $search, $parent );
			foreach ( $categories as $category ) {				
				$data['categories'][] = array(
					'category_id' => $category['category_id'],
					'name'        => $category['name'],
					'children'    => [],
					'href'        => $this->url->link('product/search', 'search=' . $search . '&category_id=' . $category['category_id'] ),
					// 'href'        => $this->url->link('product/category', 'path=' . $full_path . '_' . $category['category_id'])
					// category_id=0&search=шина&submit_search=&route=product%2Fsearch
				);

			}
			
			$data['search'] = $search;
		}

		return $this->load->view('extension/module/category', $data);
	}
}