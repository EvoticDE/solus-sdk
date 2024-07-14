<?php

namespace Evotic\SolusSDK\Api\Projects;

use Evotic\SolusSDK\SolusClient;

use Evotic\SolusSDK\Interfaces\Projects\ISolusProjectServerCreateOptions;

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

    /**
     * Create a server under a project
     * 
     * @param int $projectId
     * @param string $name
     * @param int $plan_id
     * @param int $location_id
     * @param int $os_image_version_id
     * @param ISolusProjectServerCreateOptions|null $options
     * 
     * @return array
     */
    public static function createServer(int $projectId, string $name, int $plan_id, int $location_id, int $os_image_version_id, ?ISolusProjectServerCreateOptions $options = null): array {
        $data = [
            'name' => $name,
            'plan_id' => $plan_id,
            'location_id' => $location_id,
            'os_image_version_id' => $os_image_version_id,
        ];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->post('/projects/' . $projectId . '/servers', $data);
    }
        
}