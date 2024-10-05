<?php

namespace nitropackio\compatibility\controller;

use NitroPack\SDK\Device;
use nitropackio\compatibility\Controller as NitropackController;
use nitropackio\core\Nitropack;
use nitropackio\core\ProductHistory;
use nitropackio\core\Tag;
use nitropackio\hook\Init;

class Catalog extends NitropackController {
    private $enabledLanguages = array();

    private $asyncElements = array(
        "journal3/main_menu" => array(
            'expirationTime' => 300,
            'cachePrefix' => 'category'
        ),
        "journal3/products" => array(
            'expirationTime' => 60,
            'cachePrefix' => 'product'
        ),
        "common/menu" => array(
            'expirationTime' => 300,
            'cachePrefix' => 'category'
        )
    );

    public function __construct($registry) {
        parent::__construct($registry);

        $this->load->model($this->ext->route->module->nitropack);

        $this->loaded->model->module_nitropack = $this->{$this->ext->model->module->nitropack};

        $this->enabledLanguages = $this->loaded->model->module_nitropack->getCacheWarmupLanguages();
    }

    public function postSeoUrl() {
        if (null !== $route = $this->getRequestRouteBase()) {
            Init::executeNitroPackIfConnected(function($nitropack) use ($route) {
                // Set the OpenCart registry
                $nitropack->setRegistry($this->registry);

                // Set the route
                $nitropack->setRoute($route);

                // Only if NitroPack is enabled, activate tags and do cache requsts.
                if ($nitropack->setting->get('status', false)) {
                    // Set the route tag
                    if ($nitropack->sdk->isAllowedRequest(true)) {
                        $nitropackTag = new Tag('route', $route);

                        $nitropack->pushTag($nitropackTag);
                    }

                    // Check if the page is cacheable
                    if ($nitropack->isPageCacheable(true, $given_reason)) {
                        // Enable the beacon which will be placed in the output buffer
                        if ($nitropack->sdk->isAllowedRequest(true)) {
                            $nitropack->setUseBeacon(true);
                            $nitropack->outputBeaconCookie(0);
                        }

                        // Disable standard OpenCart compression. This is required for the beacon/tracking search and replace to commence
                        $this->config->set('config_compression', 0);
                        $this->response->setCompression(0);
                        
                        if ($nitropack->isServiceRequest()) {
                            // Fetch remote file
                            $nitropack->sdk->hasRemoteCache('default', false);

                            if ($nitropack->isWarmupRequest()) {
                                // We are not interested in the warmup requests
                                exit;
                            }

                            // Output stale (invalidated) cache, if it exists
                            $nitropack->setUseBeacon(false);
                            $nitropack->serveLocalCache(true, "CONTROLLER");
                        }
                    } else {
                        Nitropack::header("X-Nitro-Disabled: 1");
                        Nitropack::header("X-Nitro-Disabled-Reason: page not cacheable: " . $given_reason);
                    }
                } else {
                    Nitropack::header("X-Nitro-Disabled: 1");
                    Nitropack::header("X-Nitro-Disabled-Reason: extension disabled");
                }
            });
        }
    }

    public function async_elements() {
        $output = [];
        $controllerArgs = [];

        if (!empty($this->request->post)) {
            Init::executeNitroPackIfConnected(function($nitropack) use (&$controllerArgs) {
                foreach ($this->request->post as $signature => $json) {
                    $decodedJson = htmlspecialchars_decode($json, ENT_COMPAT);
                    $signedPayload = $nitropack->signPayload($decodedJson);
                    if ($this->loaded->model->module_nitropack->hashEquals($signature, $signedPayload)) {
                        $controllerArgs[$signedPayload] = json_decode($nitropack->decryptPayload($decodedJson), true);
                    }
                }
            });
        }

        $original_get = $this->request->get;

        foreach ($controllerArgs as $key => $args) {
            // Overwrite GET
            $this->request->get = $args['get'];

            $cacheKey = $this->asyncElements[$args['route']]['cachePrefix'] . '.nitropackio_async.' . $this->config->get('config_store_id') . '.' . md5(json_encode($args));

            $html = $this->cache->get($cacheKey);

            if (empty($html)) {
                $html = $this->load->controller($args['route'], array_merge(
                    $args['args'],
                    array( 'nitro_force_execute' => true )
                ));

                $this->cache->set($cacheKey, $html);
            }

            $output[$key] = array(
                'expirationTime' => $this->asyncElements[$args['route']]['expirationTime'],
                'html' => $html
            );
        }

        // Restore GET
        $this->request->get = $original_get;

        $content = json_encode($output);

        $this->response->addHeader("Content-Type: application/json");
        $this->response->setCompression((int)$this->config->get('config_compression'));
        $this->response->setOutput($content);
    }

    public function beforeAsyncElement($route = null, &$args = null, &$output = null) {
        // If this hidden constant is not enabled, do nothing
        if (!NITROPACK_USE_ASYNC_ELEMENTS) {
            return;
        }

        // If this is a force-executed element, do nothing in this event to allow it to execute
        if (!empty($args['nitro_force_execute'])) {
            return;
        }

        // Do nothing if NitroPack is disabled
        $activate_async_elements = false;

        Init::executeNitroPackIfActive(function($nitropack) use (&$activate_async_elements) {
            $activate_async_elements = $nitropack->isPageCacheable() && $nitropack->isWorkerRequest();
        });

        if (!$activate_async_elements) {
            return;
        }

        // Disable tagging
        Init::executeNitroPackIfActive(function($nitropack) {
            $nitropack->setUseTagging(false);
        });

        // Detect the device
        $user_agent = !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

        $device_type = new Device($user_agent);

        // Generate JSON with the controller and GET data
        $json = json_encode([ 'route' => $route, 'args' => $args, 'get' => $this->request->get, 'detected_device_type' => $device_type->getType(), 'detected_language_id' => $this->config->get('config_language_id') ]);

        // Prepare to cache the element
        $cacheKey = $this->asyncElements[$route]['cachePrefix'] . '.nitropackio_async.' . $this->config->get('config_store_id') . '.' . md5($json);

        // Execute the element to ensure any dependent data will be set
        $html = $this->load->controller($route, array_merge(
            $args,
            array( 'nitro_force_execute' => true )
        ));

        // Cache the element
        $this->cache->set($cacheKey, $html);

        // Prepare a signature
        $signature = "";

        Init::executeNitroPackIfActive(function($nitropack) use (&$signature, &$json) {
            // Reenable tagging
            $nitropack->setUseTagging(true);

            // Encrypt JSON
            $json = $nitropack->encryptPayload($json);

            // Sign the payload
            $signature = $nitropack->signPayload($json);
        });

        // Overwrite the output with a placeholder
        $output = sprintf('<script type="text/placeholder" data-nitro-async="%s">%s</script>',
            $signature,
            $json
        );

        // Set a config flag that there exist async elements
        Init::executeNitroPackIfConnected(function($nitropack) {
            $nitropack->setUseAsyncElements(true);
        });

        return $output;
    }

    public function tracking() {
        if (isset($this->request->post['tracking'])) {
            $tracking = htmlspecialchars_decode($this->request->post['tracking'], ENT_QUOTES);

            if (!headers_sent()) {
                Nitropack::setCookie('tracking', $tracking, [
                    'expires' => time() + 3600 * 24 * 1000,
                    'samesite' => 'Strict',
                    'path' => '/',
                    'domain' => $this->registryGet('request')->server['HTTP_HOST'],
                    'secure' => true,
                    'httponly' => false,
                ]);

                if (version_compare(NITROPACK_OPENCART_VERSION, '2', '>=')) {
                    $this->db->query("UPDATE `" . DB_PREFIX . "marketing` SET clicks = (clicks + 1) WHERE code = '" . $this->db->escape($tracking) . "'");
                }
            }
        }
    }

    public function webhook_config() {
        $this->loaded->model->module_nitropack->fetchConfig();
    }

    public function webhook_cache_clear() {
        $this->loaded->model->module_nitropack->clearPageCache();
    }

    public function webhook_cache_ready() {
        $this->loaded->model->module_nitropack->cacheReady();
    }

    public function sitemap() {
        ini_set("max_execution_time", 300);
        ini_set("memory_limit", "512M");

        $ssl = !!$this->config->get('config_secure');

        Nitropack::header("Content-Type: application/xml");
        Nitropack::header("Cache-Control: no-cache");

        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Provide a sitemap only in case NitroPack is enabled
        if ($this->loaded->model->module_nitropack->isSettingEnabled('status', (int)$this->config->get('config_store_id'))) {

            // Home
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('common/home') && $this->loaded->model->module_nitropack->isRouteEnabled('common/home')) {
                $home = $this->getHomeRoute();
                $usedHomeRoutes = array();

                if ($ssl) {
                    $base = $this->config->get('config_ssl');
                } else {
                    $base = $this->config->get('config_url');
                }

                echo $this->outputSitemapUrl($base);
                $usedHomeRoutes[] = $base;

                $manualHomeRoute = $base . 'index.php?route=' . $home;

                echo $this->outputSitemapUrl($manualHomeRoute);
                $usedHomeRoutes[] = $manualHomeRoute;

                $seoHomeRoute = $this->url->link($home, '', $ssl);

                if (!in_array($seoHomeRoute, $usedHomeRoutes)) {
                    echo $this->outputSitemapUrl($seoHomeRoute);
                    $usedHomeRoutes[] = $seoHomeRoute;
                }
            }

            // Categories
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('product/category') && $this->loaded->model->module_nitropack->isRouteEnabled('product/category')) {
                $this->iterateEntities('product/category', $ssl, array($this->loaded->model->module_nitropack, 'iterateCategories'));
            }

            // Informations
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('information/information') && $this->loaded->model->module_nitropack->isRouteEnabled('information/information')) {
                $this->iterateEntities('information/information', $ssl, array($this->loaded->model->module_nitropack, 'iterateInformations'));
            }

            // Products
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('product/product') && $this->loaded->model->module_nitropack->isRouteEnabled('product/product')) {
                $this->iterateEntities('product/product', $ssl, array($this->loaded->model->module_nitropack, 'iterateProducts'));
            }

            // Specials
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('product/special') && $this->loaded->model->module_nitropack->isRouteEnabled('product/special')) {
                echo $this->outputSitemapUrl($this->url->link('product/special', '', $ssl));
            }

            // Manufacturers
            if ($this->loaded->model->module_nitropack->isCacheWarmupEnabled('product/manufacturer') && $this->loaded->model->module_nitropack->isRouteEnabled('product/manufacturer')) {
                echo $this->outputSitemapUrl($this->url->link('product/manufacturer', '', $ssl));

                $this->iterateEntities('product/manufacturer/info', $ssl, array($this->loaded->model->module_nitropack, 'iterateManufacturers'));
            }
        }

        echo '</urlset>';

        exit;
    }

    private function iterateEntities($route, $ssl, $iterate_method) {
        $page = 1;

        do {
            $success = $iterate_method($this->config->get('config_store_id'), $page++, function($batch) use (&$route, &$ssl) {
                $route_parts = explode('/', $route);

                $cache_key = $route_parts[0] . '.nitropackio.' . $this->config->get('config_store_id') . '.' . (int)$ssl . '.' . md5(json_encode($batch) . json_encode($this->enabledLanguages));

                $xmlTags = $this->cache->get($cache_key);

                if (empty($xmlTags)) {
                    $xmlTags = '';

                    $all_language_urls = array();
                    $default_language = $this->config->get('config_language_id');
                    $default_session_language = isset($this->session->data['language']) ? $this->session->data['language'] : null;

                    foreach ($batch as $entity) {
                        foreach ($this->enabledLanguages as $language) {
                            $this->config->set('config_language_id', $language['language_id']);
                            $this->session->data['language'] = $language['code'];

                            $all_language_urls[] = $this->url->link($route, http_build_query($entity), $ssl);
                        }
                    }

                    $all_language_urls = array_values(array_unique($all_language_urls));

                    foreach ($all_language_urls as $language_url) {
                        $xmlTags .= $this->outputSitemapUrl($language_url);
                    }

                    $this->config->set('config_language_id', $default_language);

                    if (null === $default_session_language) {
                        $this->session->data['language'] = $default_session_language;
                    } else {
                        unset($this->session->data['language']);
                    }

                    $this->cache->set($cache_key, $xmlTags);
                }

                echo $xmlTags;

                return true;
            });
        } while ($success);
    }

    private function outputSitemapUrl($url) {
        return '<url><loc>' . $url . '</loc></url>';
    }

    /* START EVENTS */

    public function cartPlaceholder($route = null, &$args = null, &$output = null) {
        $do_override = !isset($this->request->get['route']) || $this->request->get['route'] != 'common/cart/info';

        if ($do_override && $this->loaded->model->module_nitropack->isSettingEnabled('allow_cart', $this->config->get('config_store_id')) && $this->loaded->model->module_nitropack->isSettingEnabled('status', $this->config->get('config_store_id'))) {
            $url = $this->url->link('common/cart/info', '', $this->getUrlSsl());
            $matches = array();

            if (preg_match('~(.*<\/div>)(.*)~s', $output, $matches)) {
                $output = $matches[1] . $this->loaded->model->module_nitropack->cartPlaceholder($url) . $matches[2];
            } else {
                $output .= $this->loaded->model->module_nitropack->cartPlaceholder($url);
            }

            return $output;
        }

        return $output;
    }

    public function afterGetProduct($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $product_id = $args[0];
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $product_id = !empty($args['product_id']) ? $args['product_id'] : 0;
        } else {
            $product_id = $route;
        }

        if (!empty($product_id) && is_numeric($product_id)) {
            $this->loaded->model->module_nitropack->setExpiresHeaderByProductId((int)$product_id);

            if (!$this->routeCompare($this->getHomeRoute())) {
                $this->loaded->model->module_nitropack->tag('product', (int)$product_id);

                // Only when we are on the product route, tag the product page with a product:quantity:<id> tag, so that we can clear the product pages for the special case when the quantity has been changed.
                if ($this->routeCompare('product/product') && isset($this->request->get['product_id']) && (int)$this->request->get['product_id'] == (int)$product_id) {
                    $this->loaded->model->module_nitropack->tag('product:quantity', (int)$product_id);
                }
            }
        }
    }

    // In OpenCart 2.1 and older, this method is not used because everything goes through afterGetProduct()
    public function afterGetProducts($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $products = $output;
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $products = $args;
        } else {
            $products = $route;
        }

        if (is_array($products)) {

                /* Start mod: NitroPack.io - Custom Mod for model/catalog/getProducts */
                if (isset($products['products'])) {
                    $products = $products['products'];
                }
                /* End mod: NitroPack.io - Custom Mod for model/catalog/getProducts */
            
            foreach ($products as $product) {
                if (is_array($product) && !empty($product['product_id']) && is_numeric($product['product_id'])) {
                    $this->loaded->model->module_nitropack->setExpiresHeaderByProductId((int)$product['product_id']);

                    if (!$this->routeCompare($this->getHomeRoute())) {
                        $this->loaded->model->module_nitropack->tag('product', (int)$product['product_id']);

                        // Only when we are on the product route, tag the product page with a product:quantity:<id> tag, so that we can clear the product pages for the special case when the quantity has been changed.
                        if ($this->routeCompare('product/product') && isset($this->request->get['product_id']) && (int)$this->request->get['product_id'] == (int)$product['product_id']) {
                            $this->loaded->model->module_nitropack->tag('product:quantity', (int)$product['product_id']);
                        }
                    }
                }
            }
        }
    }

    public function afterGetCategory($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $category_id = $args[0];
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $category_id = !empty($args['category_id']) ? $args['category_id'] : 0;
        } else {
            $category_id = $route;
        }

        if (!empty($category_id) && is_numeric($category_id) && !$this->routeCompare($this->getHomeRoute()) && $this->routeCompare('product/category') && isset($this->request->get['path'])) {
            $path_categories = array_filter(explode('_', $this->request->get['path']));
            $final_category_id = end($path_categories);

            if ($final_category_id == $category_id) {
                $this->loaded->model->module_nitropack->tag('category', (int)$category_id);
            }
        }
    }

    public function afterGetManufacturer($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $manufacturer_id = $args[0];
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $manufacturer_id = !empty($args['manufacturer_id']) ? $args['manufacturer_id'] : 0;
        } else {
            $manufacturer_id = $route;
        }

        if (!empty($manufacturer_id) && is_numeric($manufacturer_id) && !$this->routeCompare($this->getHomeRoute())) {
            $this->loaded->model->module_nitropack->tag('manufacturer', (int)$manufacturer_id);
        }
    }

    public function afterGetManufacturers($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $manufacturers = $output;
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $manufacturers = $args;
        } else {
            $manufacturers = $route;
        }

        if (!$this->routeCompare($this->getHomeRoute())) {
            foreach ($manufacturers as $manufacturer) {
                if (is_array($manufacturer) && !empty($manufacturer['manufacturer_id']) && is_numeric($manufacturer['manufacturer_id'])) {
                    $this->loaded->model->module_nitropack->tag('manufacturer', (int)$manufacturer['manufacturer_id']);
                }
            }
        }
    }

    public function afterGetInformation($route = null, $args = null, $output = null) {
        if (version_compare(NITROPACK_OPENCART_VERSION, '2.3.0.0', '>=') || $this->loaded->model->module_nitropack->isSettingEnabled('is_using_d_event_manager', $this->config->get('config_store_id'))) {
            $information_id = $args[0];
        } else if (version_compare(NITROPACK_OPENCART_VERSION, '2.2.0.0', '>=')) {
            $information_id = !empty($args['information_id']) ? $args['information_id'] : 0;
        } else {
            $information_id = $route;
        }

        if (!empty($information_id) && is_numeric($information_id) && !$this->routeCompare($this->getHomeRoute()) && $this->routeCompare('information/information') && isset($this->request->get['information_id']) && $this->request->get['information_id'] == $information_id) {
            $this->loaded->model->module_nitropack->tag('information', (int)$information_id);
        }
    }

    // Deprecated
    public function afterGetCategories($route = null, $args = null, $output = null) {
    }

    // Deprecated
    public function afterGetInformations($route = null, $args = null, $output = null) {
    }

    // Deprecated
    public function afterAddOrderHistory($route = null, $args = null, $output = null) {
    }

    /* END EVENTS */
}
