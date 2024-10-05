<?php
class ControllerExtensionModuleFeaturedCategories extends Controller {
	public function index( $setting ) {
		$this->document->addStyle('catalog/view/javascript/so_extra_slider/css/style.css');
		$this->document->addStyle('catalog/view/javascript/so_extra_slider/css/css3.css');
		if (!defined ('OWL_CAROUSEL'))
		{
			$this->document->addStyle('catalog/view/javascript/so_extra_slider/css/animate.css');
			$this->document->addStyle('catalog/view/javascript/so_extra_slider/css/owl.carousel.css');
			$this->document->addScript('catalog/view/javascript/so_extra_slider/js/owl.carousel.js');
			define( 'OWL_CAROUSEL', 1 );
		}
		
		$data['suffix'] = rand() . time();

		$this->load->language('extension/module/featured_categories');

		$this->load->model('catalog/category');

		$this->load->model('tool/image');

		$data['categories'] = array();	
		

		if (!$setting['limit']) {
			$setting['limit'] = 5;
		}

		$data['head_name'] = $setting['name'];
		
		if (!empty($setting['category'])) {

			$categories = array_slice($setting['category'], 0, (int)$setting['limit']);

			foreach ($categories as $category_id) {
				$category_info = $this->model_catalog_category->getCategory($category_id);

				if ($category_info) {
					if ($category_info['image']) {
						$image = $this->model_tool_image->resize($category_info['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}					

					$data['categories'][] = array(
						'category_id'  => $category_info['category_id'],
						'thumb'       => $image,
						'name'        => $category_info['name'],				
						//TO DO - CHECK LINK		
						'href'        => $this->url->link('product/category', 'path=' . $category_info['category_id'])
					);
				}
			}
		}

		if ($data['categories']) {
			return $this->load->view('extension/module/featured_categories', $data);
		}
	}
}