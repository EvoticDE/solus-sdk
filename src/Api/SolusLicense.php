<?php

namespace Evotic\SolusSDK\Api;

use Evotic\SolusSDK\SolusClient;

class SolusLicense {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * Retrieve the license information
     * 
     * @return array
     */
    public static function get(): array {
        return self::getClient()->get('/solus-license');
    }

    /**
     * Activate a license
     * 
     * @param string $licenseKey
     * 
     * @return array
     */
    public static function activate(string $licenseKey): array {
        return self::getClient()->post('/solus-license/activate', [
            'activation_code' => $licenseKey
        ]);
    }

    /**
     * Refresh the license
     * 
     * @return array
     */
    public static function refresh(): array {
        return self::getClient()->post('/solus-license/refresh');
    }

}