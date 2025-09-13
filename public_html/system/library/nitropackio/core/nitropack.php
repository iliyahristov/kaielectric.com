<?php

namespace nitropackio\core;

use NitroPack\HttpClient\HttpClient as Client;
use NitroPack\SDK\Filesystem;
use NitroPack\SDK\HealthStatus;
use NitroPack\SDK\NitroPack as SDK;
use NitroPack\SDK\StorageDriver\Disk as DiskStorageDriver;
use NitroPack\SDK\StorageDriver\Redis as RedisStorageDriver;
use nitropackio\core\Domain;
use nitropackio\core\exception\Domain as DomainException;
use nitropackio\core\exception\Nitropack as NitropackException;
use nitropackio\core\exception\Setting as SettingException;

class Nitropack {
    const ERROR_LOG_FILENAME = 'nitropackio.error.log';
    const DEBUG_LOG_FILENAME = 'nitropackio.debug.log';

    const SKIP_ACTION_ORDER = "SKIPPING product <%s> ORDERED action for store <%s>.";
    const ORDERED_IN_STORE = "{O.U.01} The product <%s> quantity CHANGED in store <%s> as a result of an ORDER add/edit/delete.";
    const REASON_INVALIDATE = "Automatic invalidation of affected store pages after add/edit/delete of order for product '%s'.";
    const REASON_INVALIDATE_ORDER = "Automatic invalidation of affected store pages after add/edit/delete of order #%s for product '%s'.";

    private static $instance;
    private static $request_id;
    public static $eventActions = array();
    public static $overrideStatus = true;
    public static $cookieFilterStatus = false;
    public static $geoIpCachePrefixStatus = false;

    public static $standard_routes = array(
        'common_home' => 'common/home',
        'product_product' => 'product/product',
        'product_category' => 'product/category',
        'product_manufacturer' => 'product/manufacturer',
        'product_special' => 'product/special',
        'information_information' => 'information/information',
        'information_sitemap' => 'information/sitemap',
    );

    public static $disallowed_routes = array(
        '~^account/(?!(login|register)$)~i',
        '~^affiliate/~i',
        '~^(extension/)?analytics/google_analytics$~i',
        '~^api/~i',
        '~^checkout/~i',
        '~^common/cart$~i',
        '~^common/column_left$~i',
        '~^common/column_right$~i',
        '~^common/content_bottom$~i',
        '~^common/content_top$~i',
        '~^common/currency$~i',
        '~^common/footer$~i',
        '~^common/footer(/.*?)+$~i',
        '~^common/header$~i',
        '~^common/language$~i',
        '~^common/maintenance$~i',
        '~^common/menu$~i',
        '~^common/search$~i',
        '~^common/seo_url$~i',
        '~^common/home/clear_html_cache$~i',
        '~^(extension/)?credit_card/~i',
        '~^ebay/openbay$~i',
        '~^error/not_found$~i',
        '~^event/~i',
        '~^(extension/)?advertise/google$~i',
        '~^(extension/)?analytics/google$~i',
        '~^(extension/)?captcha/~i',
        '~^(extension/)?module/account$~i',
        '~^(extension/)?module/affiliate$~i',
        '~^(extension/)?module/amazon_button$~i',
        '~^(extension/)?module/amazon_checkout_layout$~i',
        '~^(extension/)?module/amazon_login$~i',
        '~^(extension/)?module/amazon_pay$~i',
        '~^(extension/)?module/banner$~i',
        '~^(extension/)?module/bestseller$~i',
        '~^(extension/)?module/carousel$~i',
        '~^(extension/)?module/category$~i',
        '~^(extension/)?module/divido_calculator$~i',
        '~^(extension/)?module/ebay_display$~i',
        '~^(extension/)?module/ebay_listing$~i',
        '~^(extension/)?module/featured$~i',
        '~^(extension/)?module/filter$~i',
        '~^(extension/)?module/google_hangouts$~i',
        '~^(extension/)?module/html$~i',
        '~^(extension/)?module/information$~i',
        '~^(extension/)?module/klarna_checkout_module$~i',
        '~^(extension/)?module/latest$~i',
        '~^(extension/)?module/laybuy_layout$~i',
        '~^(extension/)?module/nitropack$~i',
        '~^(extension/)?module/pilibaba_button$~i',
        '~^(extension/)?module/pp_braintree_button$~i',
        '~^(extension/)?module/pp_button$~i',
        '~^(extension/)?module/pp_layout$~i',
        '~^(extension/)?module/pp_login$~i',
        '~^(extension/)?module/sagepay_direct_cards$~i',
        '~^(extension/)?module/sagepay_server_cards$~i',
        '~^(extension/)?module/slideshow$~i',
        '~^(extension/)?module/special$~i',
        '~^(extension/)?module/store$~i',
        '~^(extension/)?module/nitropack/sitemap$~i',
        '~sitemap~i',
        '~^(extension/)?openbay/~i',
        '~^(extension/)?payment/~i',
        '~^(extension/)?recurring/~i',
        '~^mail/~i',
        '~^product/compare$~i',
        '~^product/product(/.*?)+$~i',
        '~^(extension/)?recurring/pp_express$~i',
        '~^startup/~i',
        '~^tool/captcha$~i',
        '~^tool/upload$~i',
        '~^(extension/)?total/coupon$~i',
        '~^(extension/)?total/reward$~i',
        '~^(extension/)?total/shipping$~i',
        '~^(extension/)?total/voucher$~i',
        '~^geekodev/~i',
        '~^(extension/)?module/ianalytics(/(.*?)+)?$~i',
        '~^(extension/)?module/notifywhenavailable(/(.*?)+)?$~i',
    );
    
    public $setting;
    public $sdk;
    
    private $route = null;
    private $tags = array();
    private $registry = null;
    private $url = null;
    private $useTagging = true;
    private $useBeacon = false;
    private $useAsyncElements = false;
    private $incomingSupportedCookies = array();

    public function __construct($domain, $connect = true) {
        // Init config
        if (is_file(DIR_CONFIG . 'nitropackio/override.php')) {
            require_once DIR_CONFIG . 'nitropackio/override.php';
        }

        require_once DIR_CONFIG . 'nitropackio/default.php';

        // Init the NitroPack storage driver
        if (Filesystem::$storageDriver === NULL) {
            switch (NITROPACK_STORAGE_DRIVER) {
                case "REDIS" :
                    Filesystem::$storageDriver = new RedisStorageDriver(NITROPACK_REDIS_HOSTNAME, NITROPACK_REDIS_PORT, NITROPACK_REDIS_PASSWORD, NITROPACK_REDIS_DATABASE);
                break;
                default :
                    Filesystem::$storageDriver = new DiskStorageDriver();
            }
        }

        // Init setting
        $this->setting = new Setting($domain);

        if ($connect) {
            $this->reload();
        }
    }

    public function setCurrentUrl($url) {
        $this->url = $url;
    }

    public function reload() {
        if ($this->setting->has('site_id') && $this->setting->has('site_secret')) {
            if (!self::$cookieFilterStatus) {
                SDK::addCookieFilter(function(&$cookies) {
                    if (empty($cookies['currency'])) {
                        $cookies['currency'] = self::getDefaultCurrency($this->setting);
                    }

                    if (empty($cookies['language'])) {
                        $cookies['language'] = self::getDefaultLanguage($this->setting);
                    }
                });

                // self::$cookieFilterStatus = true;                
            }

            // SxGeo compatibility
            $this->sxGeoCompatibility();

            // Geo IP currency compatibility
            $this->geoIpCurrencyCompatibility();

            $this->sdk = new SDK($this->setting->get('site_id'), $this->setting->get('site_secret'), null, $this->url, self::cacheDir());

            // Check health status every 5 minutes
            $isHealthStatusExpired = time() - $this->setting->get('health_last_check', 0) >= NITROPACK_HEALTH_CHECK_INTERVAL;
            if ($isHealthStatusExpired) {
                $this->sdk->checkHealthStatus();

                $this->setting->set('health_last_check', time());
                $this->setting->save();
            }

            $this->sdk->setCachePathSuffix($this->setting->get('site_id'));

            if ((bool)$this->setting->get('compression', false)) {
                $this->sdk->enableCompression();
            } else {
                $this->sdk->disableCompression();
            }
        } else {
            // Run any destructors
            unset($this->sdk);

            // Set to null
            $this->sdk = null;
        }
    }

    public function preserveIncomingSupportedCookies() {
        foreach ($this->sdk->getConfig()->PageCache->SupportedCookies as $supportedCookie) {
            if (isset($_COOKIE[$supportedCookie])) {
                $this->incomingSupportedCookies[$supportedCookie] = $_COOKIE[$supportedCookie];
            }
        }
    }

    public function overrideIncomingSupportedCookies($cookies_json) {
        // Override the cookies
        if (null !== $beaconCookies = @json_decode($cookies_json, true)) {
            $_COOKIE = $beaconCookies;
        } else {
            throw new NitropackException("Cannot parse beacon cookies: " . var_export($cookies_json, true));
        }
    }

    public function verifyBeaconSignature() {
        $expected_hash = $this->signBeaconRequest(array(
            'url' => $_POST['nitropack_beacon_url'],
            'cookies_json' => $_POST['nitropack_beacon_cookies']
        ));

        return hash_equals($expected_hash, $_POST['nitropack_beacon_signature']);
    }

    public function signBeaconRequest($request) {
        $payload = $request['url'] . ';' . $request['cookies_json'];

        return $this->signPayload($payload);
    }

    public function isHealthBeaconRequest() {
        return isset($_POST['nitropack_beacon_health']);
    }

    public function signPayload($payload) {
        return hash_hmac('sha256', $payload, $this->setting->get('site_secret'));
    }

    public function encryptPayload($payload) {
        if (version_compare(NITROPACK_OPENCART_VERSION, "3", ">")) {
            $encryption = new \Encryption();

            return @$encryption->encrypt($this->setting->get('site_secret'), $payload);
        } else {
            $encryption = new \Encryption($this->setting->get('site_secret'));

            return @$encryption->encrypt($payload);
        }
    }

    public function decryptPayload($payload) {
        if (version_compare(NITROPACK_OPENCART_VERSION, "3", ">")) {
            $encryption = new \Encryption();

            return @$encryption->decrypt($this->setting->get('site_secret'), $payload);
        } else {
            $encryption = new \Encryption($this->setting->get('site_secret'));

            return @$encryption->decrypt($payload);
        }
    }

    // Identifies beacon requests
    public function isBeaconRequest() {
        return isset($_POST['nitropack_beacon_url']) && isset($_POST['nitropack_beacon_cookies']) && isset($_POST['nitropack_beacon_signature']);
    }

    // Identifies service requests - NitroPack Service / Warmup / PageSpeed
    public function isServiceRequest() {
        return $this->isWorkerRequest() || $this->isWarmupRequest() || $this->isLighthouseRequest();
    }

    public function isWorkerRequest() {
        return isset($_SERVER["HTTP_X_NITROPACK_REQUEST"]);
    }

    public function isWarmupRequest() {
        return isset($_SERVER['HTTP_X_NITRO_WARMUP']);
    }

    public function isLighthouseRequest() {
        return isset($_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'], "Lighthouse") !== false;
    }

    public static function header($header, $replace = true, $http_response_code = null) {
        if (!headers_sent()) {
            if ($http_response_code === null) {
                header($header, $replace);
            } else {
                header($header, $replace, $http_response_code);
            }

            return true;
        }

        return false;
    }

    public static function getRequestId() {
        if (self::$request_id === null) {
            self::$request_id = uniqid();
        }

        return self::$request_id;
    }

    public static function getRequestUri() {
        if (isset($_SERVER['REQUEST_URI'])) {
            return $_SERVER['REQUEST_URI'];
        }

        return '';
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Nitropack(Domain::identify());
        }

        return self::$instance;
    }

    public static function getDefaultCurrency($setting) {
        return $setting->get('default_currency', '');
    }

    public static function getDefaultLanguage($setting) {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && NITROPACK_USE_HTTP_ACCEPT_LANGUAGE) {
            foreach (explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $browser_language) {
                foreach ($setting->get('active_languages', array()) as $active_language) {
                    if (in_array(strtolower($browser_language), $active_language['locales'])) {
                        return $active_language['code'];
                    }
                }
            }
        }
        
        return $setting->get('default_language', '');
    }

    /**
     * Execution block, wrapping the code in a custom error handler. Used to suppress any internal SDK errors and log them in the NitroPack error log instead.
     * @param  Callable $callback The main execution
     * @param  Callable|null $error_callback   An error handler
     * @return mixed          Return the result of $callback but if it fails, return the result of $error, but if it does not exist, return null.
     */
    public static function executionBlock($callback, $error_callback = null) {
        set_error_handler(function($code, $message, $file, $line) {
            if (!(error_reporting() & $code)) {
                return false;
            }

            switch ($code) {
                case E_NOTICE:
                case E_USER_NOTICE:
                    $error = 'Notice';
                    break;
                case E_WARNING:
                case E_USER_WARNING:
                    $error = 'Warning';
                    break;
                case E_ERROR:
                case E_USER_ERROR:
                    $error = 'Fatal Error';
                    break;
                default:
                    $error = 'Unknown';
                    break;
            }

            $message = 'PHP ' . $error . ':  ' . $message . ' in ' . $file . ' on line ' . $line;

            throw new \Exception($message, $code);
        });

        $result = null;

        try {
            $result = $callback();
        } catch (\Exception $e) {
            self::logException($e);

            if (is_callable($error_callback)) {
                @$error_callback($e->getMessage());
            }
        }

        restore_error_handler();

        return $result;
    }

    public static function logException($exception) {
        self::logMessage(
            self::ERROR_LOG_FILENAME,
            NITROPACK_ERROR_LOG_FILESIZE_LIMIT,
            $exception->getMessage() . PHP_EOL . $exception->getTraceAsString() . PHP_EOL . str_repeat("=", 32)
        );
    }

    public static function logDebugMessage($message) {
        self::logMessage(
            self::DEBUG_LOG_FILENAME,
            NITROPACK_DEBUG_LOG_FILESIZE_LIMIT,
            $message
        );
    }

    public static function isRouteDisallowed($route) {
        foreach (self::$disallowed_routes as $disallowed) {
            if (preg_match($disallowed, $route)) {
                return true;
            }
        }

        return false;
    }

    private static function logMessage($filename, $max_size, $message) {
        $file = DIR_LOGS . $filename;

        clearstatcache(true);

        if ((!file_exists($file) && !is_writable(DIR_LOGS)) || (file_exists($file) && !is_writable($file))) {
            // Do nothing, as we have no permissions
            return;
        }

        if (file_exists($file) && filesize($file) >= $max_size) {
            $mode = 'wb';
        } else {
            $mode = 'ab';
        }

        if (false !== $fh = fopen($file, $mode)) {
            fwrite($fh, date('Y-m-d H:i:s') . ' [' . self::getRequestId() . '] [' . self::getRequestUri() . '] - ' . $message . PHP_EOL);

            fclose($fh);
        }
    }

    public function serveLocalCache($use_invalidated, $from) {
        if (!headers_sent()) {
            self::header("Cache-Control: no-cache");
            self::header("X-Nitro-Integration-Version: " . $this->setting->get('integration_version'));
            self::header("X-Nitro-SDK-Version: " . SDK::VERSION);

            if (empty($_SERVER["HTTP_X_NITROPACK_REQUEST"])) {
                $previous = $this->sdk->pageCache->getUseInvalidated();

                $this->sdk->pageCache->useInvalidated($use_invalidated);
                // $this->sdk->loadHealthStatus(); // this does not appear to be required, as we do it in the SDK constructor

                if ($this->sdk->hasLocalCache()) {
                    // The cache exists locally. Output it and terminate the script.
                    self::header("X-Nitro-Cache: HIT");
                    self::header("X-Nitro-Cache-From: " . $from . "/" . ($use_invalidated ? "STALE" : "FRESH"));

                    // Set a cookie for the beacon
                    $this->outputBeaconCookie($use_invalidated ? 0 : 1);

                    $this->sdk->pageCache->readfile();

                    exit;
                } else if ($this->sdk->getHealthStatus() == HealthStatus::SICK) {
                    self::logException(new \Exception("Health status = SICK."));
                    self::header("X-Nitro-Cache: MISS");
                    self::header("X-Nitro-Cache-From: SICK");
                } else {
                    self::header("X-Nitro-Cache: MISS");
                }

                $this->sdk->pageCache->useInvalidated($previous);
            }
        }

        return null;
    }

    // Set a cookie for the beacon
    public function outputBeaconCookie($value) {
        // Value = 1 means that the beacon will be skipped
        // Value != 1 means that the beacon will fire
        Nitropack::setCookie('nitropack_cache_hit', $value, [
            'expires' => time() + 60,
            'samesite' => 'Strict',
            'path' => '/',
            'domain' => isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '',
            'secure' => true,
            'httponly' => false,
        ]);
    }

    public static function setCookie($name, $value, $options) {
        if (version_compare(PHP_VERSION, '7.3', '>=')) {
            setcookie($name, $value, $options);
        } else {
            setcookie($name, $value, $options['expires'], $options['path'], $options['domain'], $options['secure'], $options['httponly']);
        }
    }

    public function setUseBeacon($status) {
        $this->useBeacon = (bool)$status;
    }

    public function getUseBeacon() {
        return $this->useBeacon;
    }

    public function setUseAsyncElements($status) {
        $this->useAsyncElements = (bool)$status;
    }

    public function getUseAsyncElements() {
        return $this->useAsyncElements;
    }

    public function setUseTagging($status) {
        $this->useTagging = (bool)$status;
    }

    public function getUseTagging() {
        return $this->useTagging;
    }

    public function setRegistry($registry) {
        $this->registry = $registry;
    }

    public function registryGet($key) {
        return $this->registry->get($key);
    }

    public function hasRegistry() {
        return $this->registry !== null;
    }

    public function setRoute($route) {
        $this->route = $route;
    }

    public function getRoute() {
        return $this->route;
    }

    public function pushTag(Tag $tag) {
        if ($this->getUseTagging() && !in_array($tag->getText(), $this->tags)) {
            $this->tags[] = $tag->getText();
        }
    }

    public static function pushEventAction(EventAction $action) {
        if ($action->nitropack->isConnected()) {
            self::$eventActions[$action->__toString()] = $action;
        }
    }

    public static function executeEventActions() {
        foreach (self::$eventActions as $action) {
            self::executionBlock(function() use (&$action) {
                self::logDebugMessage($action->getMessage());

                $action->execute();
            });
        }
    }

    public function cookie() {
        if (!$this->isInAdmin()) {
            $is_nitropack_disabled = !$this->isPageCacheable(false);

            if (!headers_sent()) {
                Nitropack::setCookie('nitropack_disabled', (int)$is_nitropack_disabled, [
                    'expires' => $is_nitropack_disabled ? time() + 60 * 60 * 24 * 365 : -1,
                    'samesite' => 'Strict',
                    'path' => '/',
                    'domain' => isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '',
                    'secure' => true,
                    'httponly' => false,
                ]);
            }
        }
    }

    public function isPageCacheable($do_route_check = true, &$given_reason = "", &$encoded_reason = "") {
        // Has any error occurred?
        if ($last_error = error_get_last()) {
            // If it is a script termination error, mark page as not cacheable
            if ($last_error['type'] === E_ERROR) {
                Nitropack::logDebugMessage(sprintf("Script termination error encountered: %s", var_export($last_error, true)));

                $given_reason = "script termination error";
                $encoded_reason = "INTERNAL_ERROR";

                return false;
            }
        }

        // Check SDK limitations
        if ($this->isConnected()) {
            // Is the URL excluded?
            if ($do_route_check && !$this->sdk->isAllowedUrl($this->sdk->getUrl())) {
                $given_reason = "url not allowed";
                $encoded_reason = "URL_NOT_ALLOWED";

                return false;
            }
        }

        // The URL is not excluded, check what the connector has to say about it
        $has_registry = $this->hasRegistry();
        $is_uri_valid = $this->isUriValid();
        $is_route_supported = !$do_route_check || ($do_route_check && $this->isRouteIncluded($this->getRoute()));

        if ($has_registry && $is_uri_valid && $is_route_supported) {
            // Is the customer logged?
            $is_logged = isset($this->registryGet('session')->data['customer_id']) && !!$this->registryGet('session')->data['customer_id'];

            // Is the admin logged?
            $is_admin_logged = isset($this->registryGet('session')->data['user_id']) && !!$this->registryGet('session')->data['user_id'];

            // Are there items in the cart?
            $products = @$this->registryGet('cart')->getProducts();
            $has_cart_items = !$this->setting->get('allow_cart', false) && !empty($products);

            // Are there items for quoting?
            $has_quote_items = $this->registry->has('quote') ? !!$this->registryGet('quote')->getProducts() : false;

            // Are there items for comparing?
            $has_compare_items = isset($this->registryGet('session')->data['compare']) && !!$this->registryGet('session')->data['compare'];

            // Are there any wishlist items?
            $has_wishlist = isset($this->registryGet('session')->data['wishlist']) && !!$this->registryGet('session')->data['wishlist'];

            // Is the YMM extension used?
            $is_ymm = isset($this->registryGet('session')->data['ymm']) && !!$this->registryGet('session')->data['ymm'];

            // Is admin valid
            $is_admin_invalid = $is_admin_logged && NITROPACK_DISABLED_FOR_ADMIN;

            $given_reason = sprintf(
                "group1 - %s",
                implode(",", [
                    (int)$is_logged,
                    (int)$has_cart_items,
                    (int)$has_quote_items,
                    (int)$has_compare_items,
                    (int)$has_wishlist,
                    (int)$is_admin_invalid,
                    (int)$is_ymm
                ])
            );
            
            if (!!$is_logged) {
                $encoded_reason = "USER_LOGGED_IN";
            } elseif (!!$has_cart_items) {
                $encoded_reason = "USER_HAS_CART";
            } elseif (!!$has_quote_items) {
                $encoded_reason = "USER_HAS_QUOTE";
            } elseif (!!$has_compare_items) {
                $encoded_reason = "USER_HAS_COMPARISON";
            } elseif (!!$has_wishlist) {
                $encoded_reason = "USER_HAS_WISHLIST";
            } elseif (!!$has_wishlist) {
                $encoded_reason = "USER_IS_ADMIN";
            } elseif (!!$has_wishlist) {
                $encoded_reason = "USER_HAS_YMM";
            }

            return !($is_logged || $has_cart_items || $has_quote_items || $has_compare_items || $has_wishlist || $is_admin_invalid || $is_ymm);
        } else {
            $given_reason = sprintf(
                "group2 - %s",
                implode(",", [
                    (int)!$has_registry,
                    (int)!$is_uri_valid,
                    (int)!$is_route_supported
                ])
            );

            if (!$has_registry) {
                $encoded_reason = "REGISTRY_INCOMPATIBILITY";
            } elseif (!$is_uri_valid) {
                $encoded_reason = "ROUTE_NOT_ALLOWED";
            } elseif (!$is_route_supported) {
                $encoded_reason = "ROUTE_NOT_SUPPORTED";
            }
        }


        return false;
    }

    public function pushTags() {
        if (!empty($this->tags)) {
            $this->sdk->tagUrl($this->sdk->getUrl(), $this->tags);
        }
    }

    public function expiresHeader() {
        if (!$this->hasRegistry() || !$this->registry->has('nitropack_cache_expires')) {
            return;
        }

        $this->registryGet('nitropack_cache_expires')->expiresHeader($this->registry);
    } 

    // An alias of pushTags(). We want to have this method for compatibility purposes for versions prior to x.3.
    public function end() {
        if ($this->isConnected() && $this->isEnabled() && $this->isRouteIncluded($this->getRoute()) && $this->isPageCacheable()) {
            $this->pushTags();
        }
    }

    public function invalidateEditedProducts() {
        if (!$this->hasRegistry() || !$this->registry->has('nitropack_product_history')) {
            return;
        }

        $this->registryGet('load')->model('catalog/product');
        $nitro_config = $this->registryGet('config')->get('nitropackio');

        foreach ($this->registryGet('nitropack_product_history')->getProductIdsWithDifference() as $product_id) {
            $product_info = $this->registryGet('model_catalog_product')->getProduct($product_id);

            foreach ($this->registryGet($nitro_config['model']['module']['nitropack'])->getProductStores($product_id) as $store_id) {
                if ($this->registryGet($nitro_config['model']['module']['nitropack'])->isSettingEnabled('auto_cache_clear_order', (int)$store_id)) {
                    Nitropack::logDebugMessage(sprintf(self::ORDERED_IN_STORE, $product_id, $store_id));

                    $session = $this->registryGet('session');

                    if (isset($session->data['order_id'])) {
                        $text_reason = sprintf(self::REASON_INVALIDATE_ORDER, (string)(int)$session->data['order_id'], $product_info['name']);
                    } else {
                        $text_reason = sprintf(self::REASON_INVALIDATE, $product_info['name']);
                    }

                    $group = NITROPACK_AUTO_CACHE_CLEAR_QUANTITY_CLEAR_ALL ? "product" : "product:quantity";

                    $this->registryGet($nitro_config['model']['module']['nitropack'])->invalidate($group, $product_id, $store_id, $text_reason);
                } else {
                    Nitropack::logDebugMessage(sprintf(self::SKIP_ACTION_ORDER, $product_id, $store_id));
                }
            }
        }
    }

    public function sendExtensionNotification($event_type, $extension_version, $domain, $additional_meta_data = array()) {
        $additional_meta_data['partner_id'] = $this->getPartnerId();

        $query_data = array(
            'event' => $event_type,
            'platform' => 'OpenCart',
            'platform_version' => NITROPACK_OPENCART_VERSION,
            'nitropack_extension_version' => $extension_version,
            'additional_meta_data' => json_encode($additional_meta_data),
            'domain' => $domain
        );

        $client = new Client($this->sdk->integrationUrl('extensionEvent') . '&' . http_build_query($query_data));
        $client->timeout = 10;
        $client->fetch();
    }

    public function languageFix() {
        // The code below is a fix intended to set the 'language' cookie before the redirect to the original page. This is required by NitroPack to correctly detect the page cache name based on this cookie.

        if ($this->hasRegistry() && isset($this->registryGet('request')->post['code']) && !headers_sent()) {
            $this->registryGet('load')->config('nitropackio/compatibility');
            $nitropack_config = $this->registryGet('config')->get('nitropackio');

            $this->registryGet('load')->model($nitropack_config['route']['module']['nitropack']);

            if ($this->registryGet($nitropack_config['model']['module']['nitropack'])->getRequestRoute() == 'common/language/language') {
                $languages = $this->registryGet($nitropack_config['model']['module']['nitropack'])->getLanguages();

                $code = $this->registryGet('request')->post['code'];

                foreach ($languages as $language) {
                    if ($language['code'] === $code) {
                        Nitropack::setCookie('language', $code, [
                            'expires' => time() + 60 * 60 * 24 * 30,
                            'samesite' => 'Strict',
                            'path' => '/',
                            'domain' => $this->registryGet('request')->server['HTTP_HOST'],
                            'secure' => true,
                            'httponly' => false,
                        ]);

                        return;
                    }
                }
            }
        }
    }

    public function currencyFix() {
        // The code below is a fix intended to set the 'currency' cookie before the redirect to the original page. This is required by NitroPack to correctly detect the page cache name based on this cookie.

        if ($this->hasRegistry() && isset($this->registryGet('request')->post['code']) && !headers_sent()) {
            $this->registryGet('load')->config('nitropackio/compatibility');
            $nitropack_config = $this->registryGet('config')->get('nitropackio');

            $this->registryGet('load')->model($nitropack_config['route']['module']['nitropack']);

            if ($this->registryGet($nitropack_config['model']['module']['nitropack'])->getRequestRoute() == 'common/currency/currency') {
                $currencies = $this->registryGet($nitropack_config['model']['module']['nitropack'])->getCurrencies();

                $code = $this->registryGet('request')->post['code'];

                foreach ($currencies as $currency) {
                    if ($currency['code'] === $code) {
                        Nitropack::setCookie('currency', $code, [
                            'expires' => time() + 60 * 60 * 24 * 30,
                            'samesite' => 'Strict',
                            'path' => '/',
                            'domain' => $this->registryGet('request')->server['HTTP_HOST'],
                            'secure' => true,
                            'httponly' => false,
                        ]);

                        return;
                    }
                }
            }
        }
    }

    public function validate($site_id, $site_secret) {
        $sdk = new SDK($site_id, $site_secret, null, null, self::cacheDir());

        $health_status = $sdk->checkHealthStatus();

        if ($health_status != HealthStatus::HEALTHY) {
            throw new \Exception(sprintf("API status: %s", $health_status));
        }
    }

    public function isEnabled() {
        return 
            self::$overrideStatus &&
            strtolower(php_sapi_name()) != "cli" && 
            $this->setting->get('status', false) && 
            !$this->setting->get('maintenance_mode', false) && 
            empty($_COOKIE['nitropack_disabled']);
    }

    public function isConnected() {
        return !empty($this->sdk);
    }

    public function isUriValid() {
        if (isset($_SERVER['REQUEST_URI'])) {
            foreach ($this->setting->get('disallowed_uri_regex', array()) as $disallowed_uri_regex) {
                if (preg_match($disallowed_uri_regex, $_SERVER['REQUEST_URI'])) {
                    return false;
                }
            }
        }

        return true;
    }

    public function isRouteIncluded($route) {
        if ($route !== null) {
            if (in_array($route, $this->setting->get('excluded_standard_pages', array()))) {
                return false;
            }

            $custom_disabled_routes = array();

            foreach ($this->setting->get('included_custom_pages', array()) as $custom_page) {
                if ($custom_page['route'] == $route) {
                    return $custom_page['status'];
                }
            }

            return in_array($route, self::$standard_routes);
        }

        return false;
    }

    public function appendToHtmlBody(&$output, $appendedContent) {
        if (stripos($output, '</body>') !== FALSE) {
            // In case a closing body tag exists, append before it
            $output = str_replace('</body>', $appendedContent . '</body>', $output);
        } else {
            // Otherwise, just append at the end of the HTML
            $output .= $appendedContent;
        }
    }

    public function tracking(&$output) {
        if ($this->hasRegistry() && !empty($output) && isset($_GET['tracking'])) {
            $this->registryGet('config')->load('nitropackio/compatibility');

            $nitro_config = $this->registryGet('config')->get('nitropackio');

            $data = array();

            $route = $nitro_config['route']['module']['nitropack'] . '/tracking';

            $data['route'] = $this->registryGet('url')->link($route, '', version_compare(NITROPACK_OPENCART_VERSION, '2', '>=') ? 'SSL' : true);
            $data['tracking'] = htmlspecialchars($_GET['tracking'], ENT_QUOTES, 'UTF-8');

            $this->appendToHtmlBody($output, $this->getHtml('tracking', $data));
        }
    }

    public function beacon(&$output) {
        if ($this->isConnected() && !empty($output)) {
            $data = array();

            $cookies_json = json_encode($this->incomingSupportedCookies);

            $data['url'] = addslashes($this->sdk->getUrl());
            $data['cookies'] = $cookies_json;
            $data['signature'] = $this->signBeaconRequest(array(
                'url' => $this->sdk->getUrl(),
                'cookies_json' => $cookies_json
            ));

            $this->appendToHtmlBody($output, $this->getHtml('beacon', $data));
        }
    }

    public function healthBeacon(&$output) {
        $isHealthBeaconExpired = time() - $this->setting->get('health_beacon_last_append', 0) >= NITROPACK_HEALTH_BEACON_INTERVAL;
        if (
            $this->isConnected() &&
            !empty($output) &&
            $isHealthBeaconExpired
        ) {
            $this->appendToHtmlBody($output, $this->getHtml('health_beacon'));
            $this->setting->set('health_beacon_last_append', time());
            $this->setting->save();
        }
    }

    public function telemetry(&$output, $isCacheable, $userAgent, $missReason, $pageType) {
        if ($this->isConnected() && !empty($output) && !$this->sdk->isAJAXRequest()) {
            $this->appendToHtmlBody(
                $output,
                $this->getHtml(
                    'np_telemetry_cache',
                    [
                        'telemetry' => !$this->isWorkerRequest() ?
                            $this->sdk->getConfig()->Telemetry : "",
                        'NPTelemetryMetadataJSON' => json_encode([
                            // 'platform' => 'OC',
                            // 'platformVersion' => VERSION,
                            // 'isCacheable' => $isCacheable,
                            // 'userAgent' => $userAgent,
                            'missReason' => $missReason,
                            'pageType' => $pageType
                        ])
                    ]
                )
            );
        }
    }

    public function identifyPageType() {
        //home, category, product, cart, checkout
        $route = !empty($_GET['route']) ? $_GET['route'] : '';

        if (stripos($route, 'common/home') === 0 || empty($route)) {
            return 'home';
        } elseif (stripos($route, 'product/category') === 0) {
            return 'category';
        } elseif (stripos($route, 'product/product') === 0) {
            return 'product';
        } elseif (stripos($route, 'checkout/cart') === 0) {
            return 'cart';
        } elseif (stripos($route, 'checkout/checkout') === 0) {
            return 'checkout';
        }

        return 'other';
    }

    public function asyncElements(&$output) {
        if ($this->isConnected() && !empty($output)) {
            $this->registryGet('config')->load('nitropackio/compatibility');

            $nitro_config = $this->registryGet('config')->get('nitropackio');
            
            $data = array();
            $params = array();

            $route = $nitro_config['route']['module']['nitropack'] . '/async_elements';

            $data['url'] = str_replace(
                '&amp;',
                '&',
                $this->registryGet('url')->link($route, http_build_query($params), version_compare(NITROPACK_OPENCART_VERSION, '2', '>=') ? 'SSL' : true)
            );

            $this->appendToHtmlBody($output, $this->getHtml('async_elements', $data));
        }
    }

    public function getHtml($file, $data = array()) {
        $keys = array_map(function($key) {
            return '{' . $key . '}';
        }, array_keys($data));

        $values = array_values($data);

        return str_replace($keys, $values, file_get_contents(NITROPACK_DIR_HTML . $file . '.html'));
    }

    public function isValidWebhookRequest() {
        $getTokenExists = isset($_GET['token']);
        $webhookRouteExists = isset($_GET['webhook_route']);
        $configTokenExists = $this->setting->has('webhook_token');

        return $getTokenExists && $webhookRouteExists && $configTokenExists && $this->hashEquals($_GET['token'], $this->setting->get('webhook_token'));
    }

    public function processWebhook() {
        $route = isset($_GET['webhook_route']) ? $_GET['webhook_route'] : "";

        switch ($route) {
            case "config" :
                self::logDebugMessage("Fetching config");

                $this->sdk->fetchConfig();
            break;
            case "cache_clear" :
                if (isset($_POST['url'])) {
                    $urls = is_array($_POST['url']) ? $_POST['url'] : array($_POST['url']);

                    self::logDebugMessage(sprintf("Purging local URL cache: %s", serialize($urls)));

                    foreach ($urls as $url) {
                        $this->sdk->purgeLocalUrlCache($url);
                    }
                } else {
                    self::logDebugMessage("Purging ALL local cache.");

                    $this->sdk->purgeLocalCache(true);
                }
            break;
            case "cache_ready" :
                self::logDebugMessage(sprintf("Cache ready webhook: %s", serialize($_POST)));

                if (isset($_POST['url'])) {
                    $this->setCurrentUrl($_POST['url']);
                    $this->reload();

                    // Fetch remote file
                    $this->sdk->hasRemoteCache('default', false);
                } else {
                    self::logDebugMessage("Cache Ready webhook failed!");
                }
            break;
        }
    }

    public function processHealthBeacon() {
        // Repeat the backlog
        // Note - this may potentially be a long operation, so the current function must execute in a stand-alone request.
        $this->sdk->backlog->replay();

        // Delete stale cache
        $this->cleanupStaleCache();
    }

    public function hasStaleCache() {
        $result = false;

        $this->recursiveDirIteration(Nitropack::cacheDir(), function($entry) use (&$result) {
            if (stripos($entry, '.stale.') !== FALSE) {
                $result = true;
            }
        });

        return $result;
    }

    public function cleanupStaleCache() {
        $dirs = array();

        $this->recursiveDirIteration(Nitropack::cacheDir(), function($entry) use (&$dirs) {
            $in_dirs = false;

            foreach ($dirs as $dir) {
                if (stripos($entry, $dir) !== FALSE) {
                    $in_dirs = true;
                    break;
                }
            }

            if (stripos($entry, '.stale.') !== FALSE && !Filesystem::isDirEmpty($entry) && !$in_dirs) {
                $dirs[] = $entry;
            }
        });

        foreach ($dirs as $dir) {
            Filesystem::deleteDir($dir);
        }

        return !empty($dirs);
    }

    public static function recursiveDirIteration($dir, $callback) {
        Filesystem::dirForeach($dir, function($entry) use (&$callback) {
            call_user_func($callback, $entry);

            if (!Filesystem::isDirEmpty($entry)) {
                self::recursiveDirIteration($entry, $callback);
            }
        });
    }

    public function hashEquals($known_string, $user_string) {
        $known_string = (string)$known_string;
        $user_string = (string)$user_string;

        if(strlen($known_string) != strlen($user_string)) {
            return false;
        } else {
            $res = $known_string ^ $user_string;
            $ret = 0;

            for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);

            return !$ret;
        }
    }

    public static function cacheDir() {
        switch (NITROPACK_STORAGE_DRIVER) {
            case "REDIS" :
                $dir = "/nitropackio/";
            break;
            default :
                $dir = (defined('DIR_STORAGE') ? DIR_STORAGE : DIR_CACHE) . 'nitropackio';

                if (!Filesystem::fileExists($dir) && !Filesystem::createDir($dir)) {
                    throw new \Exception("No permissions to create cache dir: $dir");
                }
        }

        return $dir;
    }

    private function geoIpCurrencyCompatibility() {
        $filepath = dirname(DIR_SYSTEM) . '/vqmod/xml/geoipcurrency.xml';

        $use_geoip = NITROPACK_FORCE_GEOIP || file_exists($filepath);

        if ($use_geoip && !self::$geoIpCachePrefixStatus) {
            // Get IP
            if(isset($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]) && $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]) {
                $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
            } else if(isset($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]) && $HTTP_SERVER_VARS["HTTP_CLIENT_IP"]) {
                $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
            } else if (isset($HTTP_SERVER_VARS["REMOTE_ADDR"]) && $HTTP_SERVER_VARS["REMOTE_ADDR"]) {
                $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
            } else if (getenv("HTTP_X_FORWARDED_FOR")) {
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $ip = getenv("HTTP_CLIENT_IP");
            } else if (getenv("REMOTE_ADDR")) {
                $ip = getenv("REMOTE_ADDR");
            } else {
                $ip = "";
            }

            if ($ip != "") {
                $url = "http://www.geoplugin.net/json.gp?ip=" . $ip;

                $cacheDir = self::cacheDir() . "/geoipcurrency";

                if (!Filesystem::fileExists($cacheDir) && !Filesystem::createDir($cacheDir)) {
                    throw new \Exception("No permissions to create cache dir: $cacheDir");
                }

                $cacheFilename = md5($url);
                $cacheFilepath = $cacheDir . "/" . $cacheFilename;

                if (Filesystem::fileExists($cacheFilepath) && (time() - Filesystem::fileMTime($cacheFilepath) <= 7 * 24 * 3600)) {
                    $json = Filesystem::fileGetContents($cacheFilepath);
                } else {
                    $json = @file_get_contents($url);

                    if (empty($json)) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        $json = curl_exec($ch);
                        curl_close($ch);
                    }

                    if (!empty($json)) {
                        Filesystem::filePutContents($cacheFilepath, $json);
                    }
                }

                if (!empty($json)) {
                    $data = @json_decode($json);

                    if (isset($data->geoplugin_currencyCode)) {
                        SDK::addCustomCachePrefix("country_currency=" . $data->geoplugin_currencyCode);

                        self::$geoIpCachePrefixStatus = true;
                    }
                }
            }
        }
    }

    private function sxGeoCompatibility() {
        if (version_compare(NITROPACK_OPENCART_VERSION, '3', '>=') && file_exists(DIR_SYSTEM . 'library/sypexgeo/SxGeo.php') && !self::$geoIpCachePrefixStatus) {

            if (!class_exists("SxGeo")) {
                require_once(DIR_SYSTEM . 'library/sypexgeo/SxGeo.php');
            }

            $SxGeo = new \SxGeo(DIR_SYSTEM . 'library/sypexgeo/SxGeo.dat');

            $iso_code = $SxGeo->getCountry(SDK::getRemoteAddr());

            SDK::addCustomCachePrefix("country_code=" . $iso_code);

            self::$geoIpCachePrefixStatus = true;
        }
    }

    private function isInAdmin() {
        return basename(rtrim(DIR_TEMPLATE, '/\\')) == 'template';
    }

    private function getPartnerId() {
        if (file_exists(NITROPACK_PARTNER_ID_FILE) && is_readable(NITROPACK_PARTNER_ID_FILE)) {
            return trim(file_get_contents(NITROPACK_PARTNER_ID_FILE));
        }

        return 'N/A';
    }
}
