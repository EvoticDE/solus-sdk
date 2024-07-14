<?php

namespace Evotic\SolusSDK\Api\Projects;

use Evotic\SolusSDK\SolusClient;

class SolusProjects {

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

    /**
     * Create a new project
     * 
     * @param string $name
     * @param string|null $description Optional. Default is null
     * 
     * @return array
     */
    public static function create(string $name, string $description = null): array {
        return self::getClient()->post('/projects', [
            'name' => $name,
            ...($description ? ['description' => $description] : [])
        ]);
    }

    /**
     * Get a project by ID
     * 
     * @param int $id
     * 
     * @return array
     */
    public static function get(int $id): array {
        return self::getClient()->get('/projects/' . $id);
    }

    /**
     * Update a project by ID
     * 
     * @param int $id
     * @param string $name
     * @param string $description Optional. Default is null
     * 
     * @return array
     */
    public static function update(int $id, string $name, string $description = null): array {
        return self::getClient()->put('/projects/' . $id, [
            'name' => $name,
            ...($description ? ['description' => $description] : [])
        ]);
    }

    /**
     * Delete a project by ID
     * 
     * @param int $id
     * 
     * @return array
     */
    public static function delete(int $id): array {
        return self::getClient()->delete('/projects/' . $id);
    }

}