<?php

require_once __DIR__ . '/init.php';

nitropackio\hook\Init::cleanupRequest();

if (!nitropackio\hook\Init::isCurrentUriRouteDisallowed()) {
    nitropackio\hook\Init::executeNitroPackIfActive(function($nitropack) {
        // At this point, we are sure NitroPack is enabled and connected (i.e. active).

        if ($nitropack->isValidWebhookRequest()) {
            $nitropack->processWebhook();

            // Nothing more to do. Just exit.
            exit;
        } else if ($nitropack->isHealthBeaconRequest()) {
            $nitropack->processHealthBeacon();

            // Nothing more to do. Just exit.
            exit;
        } else if ($nitropack->isBeaconRequest() && $nitropack->verifyBeaconSignature()) {
            // Handle beacon requests

            // Override incoming cookies. They will later be passed to the beacon HTML
            $nitropack->overrideIncomingSupportedCookies($_POST['nitropack_beacon_cookies']);

            // Set the NitroPack working URL to the one provided by the beacon
            $nitropack->setCurrentUrl(nitropackio\core\Helper::htmlEntityDecode($_POST['nitropack_beacon_url']));

            // Reload the SDK to use the new URL and cookies
            $nitropack->reload();

            // Fetch remote file
            $nitropack->sdk->hasRemoteCache('default', false);

            // Exit, as we have nothing more to do here
            exit;
        } else {
            // Handle standard requests

            // Preserve incoming supported cookies, so that they can be passed to the beacon request
            $nitropack->preserveIncomingSupportedCookies();

            // Serve fresh (non-invalidated) cache, if it exists
            $nitropack->serveLocalCache(false, "INDEX");

            // In case this is not a service request, serve stale invalidated cache if it exists
            // @todo - disable invalidated cache for ajax requests
            if (!$nitropack->isServiceRequest()) {
                $nitropack->serveLocalCache(true, "INDEX");
            }
        }
    });

    nitropackio\hook\Init::executeNitroPackIfConnected(function($nitropack) {
        if ($nitropack->setting->get('status', false)) {
            // Wrap the OpenCart output in a buffer, and register a shutdown function
            ob_start();

            register_shutdown_function(function() use (&$nitropack) {
                // Serve relevant cookies
                $nitropack->languageFix();
                $nitropack->currencyFix();
                $nitropack->cookie();

                // Get the output
                $buf = ob_get_clean();

                // Remove BOM from output
                $bom = pack('H*','EFBBBF');
                $buf = preg_replace("/^($bom)*/", '', $buf);

                // Remove faulty background image style
                $buf = str_replace("background-image:url('')", "", $buf);

                try {
                    $isCacheable = 0;
                    $missReasonHuman = "";
                    $missReasonEncoded = "";

                    // Tasks for cacheable pages
                    if ($nitropack->isPageCacheable(true, $missReasonHuman, $missReasonEncoded)) {
                        $isCacheable = 1;

                        // Tasks only for the case when the request is coming from the worker
                        if ($nitropack->isWorkerRequest()) {
                            // X-Nitro-Expires header
                            $nitropack->expiresHeader();

                            // Push NitroPack tags
                            $nitropack->pushTags();

                            // Attach tracking script
                            $nitropack->tracking($buf);

                            // Attach the async elements script
                            if ($nitropack->getUseAsyncElements()) {
                                $nitropack->asyncElements($buf);
                            }
                        }

                        // Attach the beacon
                        if ($nitropack->getUseBeacon()) {
                            $nitropack->beacon($buf);
                            $nitropack->healthBeacon($buf);
                        }
                    }   

                    //Attach telemetry script
                    // Note - we do this only on allowed routes, to avoid issues that may arise with output buffering
                    $has_html = stripos($buf, '</html>') !== false;
                    if (!nitropackio\hook\Init::isCurrentUriRouteDisallowed() && $has_html) {
                        $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
                        $pageType = $nitropack->identifyPageType();

                        $nitropack->telemetry($buf, $isCacheable, $userAgent, $missReasonEncoded, $pageType);
                    }
                } catch (\Exception $e) {
                    nitropackio\core\Nitropack::header("X-Nitro-Disabled: 1");
                    nitropackio\core\Nitropack::header("X-Nitro-Disabled-Reason: internal error detected");
                    nitropackio\core\Nitropack::$overrideStatus = false;
                    nitropackio\core\Nitropack::logException($e);
                }

                // Do the output
                echo $buf;

                // Post-output tasks
                try {
                    $nitropack->invalidateEditedProducts();
                    nitropackio\core\Nitropack::executeEventActions();
                } catch (\Exception $e) {
                    nitropackio\core\Nitropack::$overrideStatus = false;
                    nitropackio\core\Nitropack::logException($e);
                }
            });
        }
    });
} else {
    nitropackio\hook\Init::executeNitroPackIfConnected(function($nitropack) {
        if ($nitropack->setting->get('status', false)) {
            register_shutdown_function(function() use (&$nitropack) {
                try {
                    $nitropack->invalidateEditedProducts();
                    nitropackio\core\Nitropack::executeEventActions();
                } catch (\Exception $e) {
                    nitropackio\core\Nitropack::$overrideStatus = false;
                    nitropackio\core\Nitropack::logException($e);
                }
            });
        }
    });
}
