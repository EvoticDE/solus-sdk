<?php

namespace Evotic\SolusSDK\Api\Projects;

use Evotic\SolusSDK\SolusClient;

class SolusProjectSSHKeys {

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
        return self::getClient()->get('/projects/' . $projectId . '/ssh_keys');
    }

    /**
     * Create a new SSH key for a project
     * 
     * @param int $projectId
     * @param string $name
     * @param string $publicKey
     * @param int $user_id
     * 
     * @return array
     */
    public static function create(int $projectId, string $name, string $publicKey, int $user_id): array {
        return self::getClient()->post('/projects/' . $projectId . '/ssh_keys', [
            'name' => $name,
            'public_key' => $publicKey,
            'user_id' => $user_id
        ]);
    }
        
}