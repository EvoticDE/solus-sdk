<?php

namespace Evotic\SolusSDK\Api;

use Evotic\SolusSDK\SolusClient;

class Projects {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    // Purely for test purpose right now but it will follow the same structure later on

    /**
     * List all projects
     * 
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('/projects');
    }

}