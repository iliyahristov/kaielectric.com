<?php
class ControllerExtensionModuleFeaturedManufacturers extends Controller {
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

		$this->load->language('extension/module/featured_manufacturers');

		$this->load->model('catalog/manufacturer');

		$this->load->model('tool/image');

		$data['manufacturers'] = array();	
		

		if (!$setting['limit']) {
			$setting['limit'] = 5;
		}

		$data['head_name'] = $setting['name'];
		
		if (!empty($setting['manufacturer'])) {

			$manufacturers = array_slice($setting['manufacturer'], 0, (int)$setting['limit']);

			foreach ($manufacturers as $manufacturer_id) {
				$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($manufacturer_id);

				if ($manufacturer_info) {
					if ($manufacturer_info['image']) {
						$image = $this->model_tool_image->resize($manufacturer_info['image'], $setting['width'], $setting['height']);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
					}					

					$data['manufacturers'][] = array(
						'manufacturer_id'  => $manufacturer_info['manufacturer_id'],
						'thumb'       => $image,
						'name'        => $manufacturer_info['name'],				
						//TO DO - CHECK LINK		
						'href'        => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $manufacturer_info['manufacturer_id'])
					);
				}
			}
		}
		$data['see_all_mans'] = $this->url->link('product/manufacturer');

		if ($data['manufacturers']) {
			return $this->load->view('extension/module/featured_manufacturers', $data);
		}
	}
}