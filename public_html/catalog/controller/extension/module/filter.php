<?php
class ControllerExtensionModuleFilter extends Controller {
	public function index() {
		$this->load->model('catalog/category');
		$this->load->language('extension/module/filter');
		$this->load->model('catalog/product');

		if( isset($this->request->get['path']) ){

			$data['man'] = 0;
			$data['parent'] = 0;

			if (isset($this->request->get['path'])) {
				$parts = explode('_', (string)$this->request->get['path']);
			} else {
				$parts = array();
			}

			$data['path'] = ($this->request->get['path']);
			
			$category_id = end($parts);			

			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {

				$url = '';

				if (isset($this->request->get['sort'])) {
					$url .= '&sort=' . $this->request->get['sort'];
				}

				if (isset($this->request->get['order'])) {
					$url .= '&order=' . $this->request->get['order'];
				}

				if (isset($this->request->get['limit'])) {
					$url .= '&limit=' . $this->request->get['limit'];
				}


				if (isset($this->request->get['filter'])) {
					$data['filter_category'] = explode(',', $this->request->get['filter']);
				} else {
					$data['filter_category'] = array();
				}

				$this->load->model('catalog/product');

				$data['filter_groups'] = array();

				$filter_groups = $this->model_catalog_category->getCategoryFilters( $category_id );

			// if ( count($filter_groups) > 1 ) { - can be only one filter group with more than one children

				foreach ($filter_groups as $filter_group) {
					
					$childen_data = array();

					if( count( $filter_group['filter'] ) > 1 ){
						foreach ( $filter_group['filter'] as $filter ) {
							$filter_data = array(
								'filter_category_id' => $category_id,
								'filter_filter'      => $filter['filter_id']
							);

							$childen_data[] = array(
								'filter_id' => $filter['filter_id'],
								'name'      => $filter['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '')
							);
						}//end foreach filters
					}//end if more than 1 filter

					//if filter group has filters to show
					if( !empty( $childen_data ) ){

						$data['filter_groups'][] = array(
							'filter_group_id' => $filter_group['filter_group_id'],
							'name'            => $filter_group['name'],
							'filter'          => $childen_data
						);
					}
				}//end foreach filter groups
			} 			
			
		} elseif( isset($this->request->get['manufacturer_id'] ) ){
			
			if( isset( $this->request->get['manufacturer_id'] ) ){

				$man_id = $this->request->get['manufacturer_id'];

			} else {
				$man_id = 0;
			}


			if( isset( $this->request->get['parent'] ) ){

				$category_id = $this->request->get['parent'];
			} else {

				$category_id = 0;
			}			

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
			if (isset($this->request->get['filter'])) {
				$data['filter_category'] = explode(',', $this->request->get['filter']);
			} else {
				$data['filter_category'] = array();
			}				

			$data['filter_groups'] = array();

			$filter_groups = $this->model_catalog_category->getManCategoryFilters( $man_id, $category_id );

			// if ( count($filter_groups) > 1 ) { - can be only one filter group with more than one children

			foreach ($filter_groups as $filter_group) {

				$childen_data = array();

				if( count( $filter_group['filter'] ) > 1 ){
					foreach ( $filter_group['filter'] as $filter ) {
						$filter_data = array(
							'filter_category_id' => $category_id,
							'filter_filter'      => $filter['filter_id']
						);

						$childen_data[] = array(
							'filter_id' => $filter['filter_id'],
							'name'      => $filter['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '')
						);
						}//end foreach filters
					}//end if more than 1 filter

					//if filter group has filters to show
					if( !empty( $childen_data ) ){

						$data['filter_groups'][] = array(
							'filter_group_id' => $filter_group['filter_group_id'],
							'name'            => $filter_group['name'],
							'filter'          => $childen_data
						);
					}
				}//end foreach filter groups

				$data['man'] = $man_id;

				
				
				$data['parent'] = $category_id;
				
			} elseif( isset( $this->request->get['search']) ) {
			
			if( isset( $this->request->get['search'] ) ){

				$search = $this->request->get['search'];

			} else {
				$search = '';
			}


			if( isset( $this->request->get['category_id'] ) ){

				$category_id = $this->request->get['category_id'];
			} else {

				$category_id = 0;
			}			

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
			if (isset($this->request->get['filter'])) {
				$data['filter_category'] = explode(',', $this->request->get['filter']);
			} else {
				$data['filter_category'] = array();
			}				

			$data['filter_groups'] = array();

			$filter_groups = $this->model_catalog_category->getSearchCategoryFilters( $search, $category_id );

			// if ( count($filter_groups) > 1 ) { - can be only one filter group with more than one children

			foreach ($filter_groups as $filter_group) {

				$childen_data = array();

				if( count( $filter_group['filter'] ) > 1 ){
					foreach ( $filter_group['filter'] as $filter ) {
						$filter_data = array(
							'filter_category_id' => $category_id,
							'filter_filter'      => $filter['filter_id']
						);

						$childen_data[] = array(
							'filter_id' => $filter['filter_id'],
							'name'      => $filter['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '')
						);
						}//end foreach filters
					}//end if more than 1 filter

					//if filter group has filters to show
					if( !empty( $childen_data ) ){

						$data['filter_groups'][] = array(
							'filter_group_id' => $filter_group['filter_group_id'],
							'name'            => $filter_group['name'],
							'filter'          => $childen_data
						);
					}
				}//end foreach filter groups

				$data['man'] = 0;			
				
				$data['parent'] = $category_id;
				
			}

			
			$data['man'] = 0;
			$data['parent'] = 0;


			return $this->load->view('extension/module/filter', $data);
		}
	}