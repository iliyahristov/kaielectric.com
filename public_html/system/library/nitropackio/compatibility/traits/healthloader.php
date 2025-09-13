<?php

namespace nitropackio\compatibility\traits;

use \nitropackio\hook\Init;
use \NitroPack\SDK\Filesystem;
use \NitroPack\SDK\StorageDriver\Disk;

trait HealthLoader {
    public function healthFileExistsAndNotWritable() {
        $result = false;

        Init::executeNitroPackIfConnected(function($nitropack) use (&$result) {
            $filename = $nitropack->sdk->getHealthStatusFile();
            $storageDriver = Filesystem::getStorageDriver();

            if ($storageDriver instanceof Disk) {
                if (Filesystem::fileExists($filename) && !is_writable($filename)) {
                    $result = true;
                }
            }
        });

        return $result;
    }

    public function getHealthFilePath() {
        $result = "";

        Init::executeNitroPackIfConnected(function($nitropack) use (&$result) {
            $result = $nitropack->sdk->getHealthStatusFile();
        });

        return $result;
    }
}
