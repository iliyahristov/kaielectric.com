<?php

namespace nitropackio\hook;

require_once DIR_SYSTEM . 'library/nitropackio/sdk/autoload.php';

// Init config
if (is_file(DIR_CONFIG . 'nitropackio/override.php')) {
    require_once DIR_CONFIG . 'nitropackio/override.php';
}

require_once DIR_CONFIG . 'nitropackio/default.php';

use nitropackio\core\Nitropack;
use nitropackio\core\exception\Domain as DomainException;

class Init {
    public static function cleanupRequest() {
        function nitropack_removeCacheBustParam($content) {
            $content = preg_replace("/(\?|%26|&#0?38;|&#x0?26;|&(amp;)?)ignorenitro(%3D|=)[a-fA-F0-9]{32}(?!%26|&#0?38;|&#x0?26;|&(amp;)?)\/?/mu", "", $content);
            return preg_replace("/(\?|%26|&#0?38;|&#x0?26;|&(amp;)?)ignorenitro(%3D|=)[a-fA-F0-9]{32}(%26|&#0?38;|&#x0?26;|&(amp;)?)/mu", "$1", $content);
        }

        if (isset($_GET["ignorenitro"])) {
            unset($_GET["ignorenitro"]);
        }

        if ($_SERVER['REQUEST_URI'] != '') {
            $_SERVER['REQUEST_URI'] = nitropack_removeCacheBustParam($_SERVER['REQUEST_URI']);
        }
    }

    public static function isCurrentUriRouteDisallowed() {
        $ob_sensitive_routes = array(
            'account/login',
            'account/register',
            'common/currency',
            'common/currency/currency',
            'common/language',
            'common/language/language'
        );

        $route = null;

        if (isset($_GET['route'])) {
            $route = trim($_GET['route'], '/');
        } else if (isset($_GET['_route_'])) {
            $route = trim($_GET['_route_'], '/');
        }

        if (!empty($route)) {
            return Nitropack::isRouteDisallowed($route) && !in_array($route, $ob_sensitive_routes);
        }

        return false;
    }

    public static function executeNitroPackIfActive($callback, $error_callback = null) {
        Nitropack::executionBlock(function() use (&$callback) {
            try {
                $nitropack = Nitropack::getInstance();
            } catch (DomainException $e) {
                Nitropack::logException($e);

                // Do nothing in case there is a domain exception error
                return;
            }

            // We only need to use NitroPack if it is enabled, and connected (SDK is active)
            if ($nitropack->isEnabled() && $nitropack->isConnected()) {
                $callback($nitropack);
            }
        }, $error_callback);
    }

    public static function executeNitroPackIfConnected($callback, $error_callback = null) {
        Nitropack::executionBlock(function() use (&$callback) {
            try {
                $nitropack = Nitropack::getInstance();
            } catch (DomainException $e) {
                Nitropack::logException($e);

                // Do nothing in case there is a domain exception error
                return;
            }

            // We only need to use NitroPack if it is enabled, and connected (SDK is active)
            if ($nitropack->isConnected()) {
                $callback($nitropack);
            }
        }, $error_callback);
    }

    public static function executeNitroPack($callback, $error_callback = null) {
        Nitropack::executionBlock(function() use (&$callback) {
            try {
                $nitropack = Nitropack::getInstance();
            } catch (DomainException $e) {
                Nitropack::logException($e);

                // Do nothing in case there is a domain exception error
                return;
            }

            // We only need to use NitroPack if it is enabled, and connected (SDK is active)
            $callback($nitropack);
        }, $error_callback);
    }
}
