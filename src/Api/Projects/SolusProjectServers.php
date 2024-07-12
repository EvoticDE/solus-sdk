<?php

namespace Evotic\SolusSDK\Api\Projects;

use Evotic\SolusSDK\SolusClient;

class SolusProjectServers {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all servers of a project
     * 
     * @param int $projectId
     * 
     * @return array
     */
    public static function list(int $projectId): array {
        return self::getClient()->get('/projects/' . $projectId . '/servers');
    }
        
}