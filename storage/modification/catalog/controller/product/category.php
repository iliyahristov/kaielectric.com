<?php
class ControllerProductCategory extends Controller {
	public function index() {
 
 /*=======Show Themeconfig=======*/ 
 $this->load->model('extension/soconfig/general'); 
 $this->load->language('extension/soconfig/soconfig'); 
 $data['objlang'] = $this->language; 
 $data['soconfig'] = $this->soconfig; 
 $data['theme_directory'] = $this->config->get('theme_default_directory'); 
 $data['our_url'] = $this->registry->get('url'); 
 /*=======url query parameters=======*/ 
 $data['url_sidebarsticky'] = isset($this->request->get['sidebarsticky']) ? $this->request->get['sidebarsticky'] : '' ; 
 $data['url_cartinfo'] = isset($this->request->get['cartinfo']) ? $this->request->get['cartinfo'] : '' ; 
 $data['url_thumbgallery'] = isset($this->request->get['thumbgallery']) ? $this->request->get['thumbgallery'] : '' ; 
 $data['url_listview'] = isset($this->request->get['listview']) ? $this->request->get['listview'] : '' ; 
 $data['url_asidePosition'] = isset($this->request->get['asidePosition']) ? $this->request->get['asidePosition'] : '' ; 
 $data['url_asideType'] = isset($this->request->get['asideType']) ? $this->request->get['asideType'] : '' ; 
 $data['url_layoutbox'] = isset($this->request->get['layoutbox']) ? $this->request->get['layoutbox'] : '' ; 
 
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);
			
			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory( $path_id );

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}
			}
		} else {
			$category_id = 0;
		}

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			$data['heading_title'] = $category_info['name'];

			$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

 
 $placeholder='placeholder.png'; 
 if($this->soconfig->get_settings('placeholder_status')){ 
 $placeholder = $this->soconfig->get_settings('placeholder_img'); 
 }else{ 
 $placeholder = 'placeholder.png'; 
 } 
 
			// Set the last category breadcrumb
			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
			} else {
				 
 $data['thumb'] = $this->model_tool_image->resize($placeholder, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height')); 
 
			}

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			$results = $this->model_catalog_category->getCategories($category_id);

			foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

 
 if ($result['image']) $image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' .$this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' .$this->config->get('config_theme') . '_image_category_height')); 
 else $image = $this->model_tool_image->resize($placeholder, $this->config->get('theme_' .$this->config->get('config_theme') . '_image_category_width'),$this->config->get( 'theme_' .$this->config->get('config_theme') . '_image_category_height')); 
 
				$data['categories'][] = array(
 'thumb' => $image,
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}

			$data['products'] = array();

			$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);

			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);


                // Flexi filter
                $filter_data = $this->load->controller('extension/module/tf_filter/filter_data', $filter_data);
                
			$res = $this->model_catalog_product->getProducts( $filter_data );
			$results = $res['products'];

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
				} else {
					$image = $this->model_tool_image->resize($placeholder, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

 
 /*======Image Galleries=======*/ 
 $data['image_galleries'] = array(); 
 $image_galleries = $this->model_catalog_product->getProductImages($result['product_id']); 
 foreach ($image_galleries as $image_gallery) { 
 $data['image_galleries'][] = array( 
 'cart' => $this->model_tool_image->resize($image_gallery['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height')), 
 'thumb' => $this->model_tool_image->resize($image_gallery['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height')) 
 ); 
 } 
 $data['first_gallery'] = array( 
 'cart' => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width')), 
 'thumb' => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width')) 
 ); 
 /*======Check New Label=======*/ 
 if ((float)$result['special']) $discount = '-'.round((($result['price'] - $result['special'])/$result['price'])*100, 0).'%'; 
 else $discount = false; 
 
 $data['reviews'] = sprintf($this->language->get('text_reviews'), (int)$result['reviews']); 
 
 
 $option_data = array(); 
 $image_data = array(); 
 if ($this->config->get('module_so_color_swatches_pro_status') && $this->config->get('module_so_color_swatches_pro_enable_product_list')) { 
 $this->load->model('extension/module/so_color_swatches_pro'); 
 $data['width_product_list'] = (int)$this->config->get('module_so_color_swatches_pro_width_product_list'); 
 if ($data['width_product_list'] == 0) { 
 $data['width_product_list'] = 15; 
 } 
 $data['height_product_list'] = (int)$this->config->get('module_so_color_swatches_pro_height_product_list'); 
 if ($data['height_product_list'] == 0) { 
 $data['height_product_list'] = 15; 
 } 
 $data['colorswatch_type'] = $this->config->get('module_so_color_swatches_pro_type'); 
 $this->document->addStyle('catalog/view/javascript/so_color_swatches_pro/css/style.css'); 
 
 $options = $this->model_extension_module_so_color_swatches_pro->getProductOptions($result['product_id']); 
 foreach ($options as $option) { 
 $product_option_value_data = array(); 
 foreach ($option['product_option_value'] as $option_value) { 
 if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) { 
 $p_image = $this->model_extension_module_so_color_swatches_pro->getProductImages($result['product_id'], $option_value['option_value_id']); 
 if (isset($p_image['image']) && $p_image['image']) { 
 $pimage = $this->model_tool_image->resize($p_image['image'], $this->config->get('theme_'.$this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_'.$this->config->get('config_theme') . '_image_product_height')); 
 } else { 
 $pimage = ''; 
 } 
 if (isset($p_image['product_image_id']) && $p_image['product_image_id']) { 
 $product_image_id = $p_image['product_image_id']; 
 } 
 else { 
 $product_image_id = ''; 
 } 
 $product_option_value_data[] = array( 
 'product_option_value_id' => $option_value['product_option_value_id'], 
 'option_value_id' => $option_value['option_value_id'], 
 'name' => $option_value['name'], 
 'image' => $this->model_tool_image->resize($option_value['image'], $data['width_product_list'], $data['height_product_list']), 
 'price' => $price, 
 'price_prefix' => $option_value['price_prefix'], 
 'color_image' => $pimage, 
 'product_image_id' => $product_image_id 
 ); 
 } 
 } 
 $option_data[] = array( 
 'product_option_id' => $option['product_option_id'], 
 'product_option_value' => $product_option_value_data, 
 'option_id' => $option['option_id'], 
 'name' => $option['name'], 
 'type' => $option['type'], 
 'value' => $option['value'], 
 'required' => $option['required'] 
 ); 
 } 
 } 
 
				$data['products'][] = array(
					'product_id'  => $result['product_id'],
'option' => $option_data,
					'thumb'       => $image,
'special_end_date' => $this->model_extension_soconfig_general->getDateEnd($result['product_id']), 
 'image_galleries' => $data['image_galleries'], 
 'first_gallery' => $data['first_gallery'], 
 'discount' => $discount, 
 'stock_status' => $result['stock_status'], 
 'reviews' => $data['reviews'], 
 'href_quickview' => htmlspecialchars_decode($this->url->link('extension/soconfig/quickview&product_id='.$result['product_id'] )), 
 'quantity' => $result['quantity'],
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating'      => $result['rating'],
					'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
				);
			}

			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			);

			if ($this->config->get('config_review_status')) {
				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
				);

				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
			);

			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
				);
			}

			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. $page), 'canonical');
			}
			
			if ($page > 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . (($page - 2) ? '&page='. ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. ($page + 1)), 'next');
			}
			$data['path'] = $category_info['category_id'];
			$data['total'] = $product_total;

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['continue'] = $this->url->link('common/home');


                    if(!isset($this->request->get['_tf_ajax'])){
                
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');

$schema = array('@context'=>'http://schema.org');
$schema['@type'] = 'BreadcrumbList';
$number = 1;
foreach ($data['breadcrumbs'] as $breadcrumb) {
    if ($number == 1) {
        $text = 'Home';
    } else {
        $text = $breadcrumb['text'];
    }
    $schema['itemListElement'][] = array('@type' => 'ListItem', 'position' => $number, 'item' => array('@id' => $breadcrumb['href'], 'name' => $text));
    $number++;
}
$this->document->setSchema($schema);
            
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/category', $data));
                    } else {
                        $data['column_left'] = $data['column_right'] = $data['content_top'] = $data['content_bottom'] = $data['footer'] = $data['header'] = '';
                        $this->response->addHeader('Content-Type: application/json');
                        $this->response->setOutput(json_encode(['content' => $this->load->view('product/category', $data),
                            'filter' => $this->load->controller('extension/module/tf_filter/getPostFilterValues')]));
                    }
		} else {
			
			$data['path'] = $category_info['category_id'];
			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/category', $url)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');


                    if(!isset($this->request->get['_tf_ajax'])){
                
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');

$schema = array('@context'=>'http://schema.org');
$schema['@type'] = 'BreadcrumbList';
$number = 1;
foreach ($data['breadcrumbs'] as $breadcrumb) {
    if ($number == 1) {
        $text = 'Home';
    } else {
        $text = $breadcrumb['text'];
    }
    $schema['itemListElement'][] = array('@type' => 'ListItem', 'position' => $number, 'item' => array('@id' => $breadcrumb['href'], 'name' => $text));
    $number++;
}
$this->document->setSchema($schema);
            
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
                    } else {
                        $data['column_left'] = $data['column_right'] = $data['content_top'] = $data['content_bottom'] = $data['footer'] = $data['header'] = '';
                        $this->response->addHeader('Content-Type: application/json');
                        $this->response->setOutput(json_encode(['content' => $this->load->view('error/not_found', $data),
                            'filter' => $this->load->controller('extension/module/tf_filter/getPostFilterValues')]));
                    }
		}
	}

	public function load_products(){

		$json = [];
		$placeholder='placeholder.png'; 

		if($this->soconfig->get_settings('placeholder_status')){ 
			$placeholder = $this->soconfig->get_settings('placeholder_img'); 
		}else{ 
			$placeholder = 'placeholder.png'; 
		} 
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
 			$sort = 'p.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['min_pr'])) {
			$min_price = $this->request->get['min_pr'];
		} else {
			$min_price = '';
		}
		if (isset($this->request->get['max_pr'])) {
			$max_price = $this->request->get['max_pr'];
		} else {
			$max_price = '';
		}
		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			// $limit = 2000;
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}

		
		// $category_info = $this->model_catalog_category->getCategory( $this->request->get['path']);

		if( !empty( $this->request->get['path'] ) ){
			
			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);
			
		} elseif( !empty( $this->request->get['parent'] ) ){
			$category_id = $this->request->get['parent'];
		} else {
			$category_id = '0';
		}

		

		if( isset( $this->request->get['man'] ) ){
			$man_id = $this->request->get['man'] ;
			
		} else {
// 			$man_id = 0;
		}

		if( isset( $this->request->get['last'] ) ){
			$last = $this->request->get['last'] ;
			
		} else {
			$last = 0;
		}
		if (isset($this->request->get['search'])) {
			$search = $this->request->get['search'];
		} else {
			$search = '';
		}


		// if ( $category_info ) {

		$json['products'] = array();

		$filter_data = [
			'filter_category_id' => $category_id,
			'filter_filter'      => $filter,
			'sort'               => $sort,
			'order'              => $order,
			'start'              => ($page - 1) * $limit,
			'limit'              => $limit,
			'filter_name'		=> $search,
			'man' 				=> $man_id,
			'last' 				=> $last
	];

                // Flexi filter
                $filter_data = $this->load->controller('extension/module/tf_filter/filter_data', $filter_data);
                
		$res = $this->model_catalog_product->getProducts( $filter_data, $min_price, $max_price );
// var_dump( $res );
// die;
		$results = $res['products'];

		foreach ( $results as $result ) {
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			} else {
				$image = $this->model_tool_image->resize($placeholder, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			}

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$price = false;
			}

			if ((float)$result['special']) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$special = false;
			}

			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
			} else {
				$tax = false;
			}

			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}
			$url = '';

                // Flexi filter
                $url .= $this->load->controller('extension/module/tf_filter/url', $url);
                
			if( !empty($man_id ) ){
				$product_href = $this->url->link('product/product', 'manufacturer_id=' . $man_id . '&product_id=' . $result['product_id'] . $url);
			}
			if (isset( $this->request->get['path'] )) {
				$path = $this->request->get['path'];
			} else {
				$path = 0;
			}

			$product_href = $this->url->link('product/product', 'path=' . $path . '&product_id=' . $result['product_id'] . $url);
			
			$json['products'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
				'price'       => $price,
				'special'     => $special,
				'tax'         => $tax,
				'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
				'rating'      => $result['rating'],
				'href'        => $product_href
			);
				// }			
			
			}//end foreach

		// }
		// $product_total 		= $this->model_catalog_product->getTotalProducts($filter_data);
		// $json['total'] 		= $product_total;
			$json['total'] 		= $res['total'];
			$json['filters'] 	= $res['filters'];
			$json['last'] 		= $res['last'];
			$json['total_with_filters'] = $res['total_with_filters'];

			
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}

		public function getFilterData(){

			$this->load->model('catalog/category');
			$json = [];
			$json['filter_data'] = $this->model_catalog_category->getFilterData( $this->request->get['filter_id'] );
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}
