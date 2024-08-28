<?php

namespace Evotic\SolusSDK\Api;

use Evotic\SolusSDK\SolusClient;

class SolusUpdates {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }
    /**
     * List all updates
     *
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('updates');
    }

    /**
     * Update a server
     *
     *
     * @return array
     */
    public static function update(): array {
        return self::getClient()->post('updates');
    }

}
