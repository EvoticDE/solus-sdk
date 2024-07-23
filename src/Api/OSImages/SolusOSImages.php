<?php

namespace Evotic\SolusSDK\Api\OSImages;

use Evotic\SolusSDK\SolusClient;

class SolusOSImages {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all OS images
     * 
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('/os_images');
    }

    /**
     * Get an OS image by ID
     * 
     * @param int $osImageId
     * 
     * @return array
     */
    public static function get(int $osImageId): array {
        return self::getClient()->get('/os_images/' . $osImageId);
    }

    /**
     * Create an OS image
     * 
     * @param string $name
     * @param int $icon_id
     * @param bool $is_visible
     * 
     * @return array
     */
    public static function create(string $name, int $icon_id, bool $is_visible = false): array {
        $data = [
            'name' => $name,
            'icon_id' => $icon_id,
            'is_visible' => $is_visible
        ];

        return self::getClient()->post('/os_images', $data);
    }

    /**
     * Update an OS image
     * 
     * @param int $osImageId
     * @param string $name
     * @param int $icon_id
     * @param bool $is_visible
     * 
     * @return array
     */
    public static function update(int $osImageId, string $name, int $icon_id, bool $is_visible = false): array {
        $data = [
            'name' => $name,
            'icon_id' => $icon_id,
            'is_visible' => $is_visible
        ];

        return self::getClient()->put('/os_images/' . $osImageId, $data);
    }

    /**
     * Patch an OS image
     * 
     * @param int $osImageId
     * @param int $position
     * @param bool $is_default
     * @param bool $is_visible
     * 
     * @return array
     */
    public static function patch(int $osImageId, int $position, bool $is_default = false, bool $is_visible = false): array {
        $data = [
            'position' => $position,
            'is_default' => $is_default,
            'is_visible' => $is_visible
        ];

        return self::getClient()->patch('/os_images/' . $osImageId, $data);
    }

    /**
     * Delete an OS image
     * 
     * @param int $osImageId
     * 
     * @return array
     */
    public static function delete(int $osImageId): array {
        return self::getClient()->delete('/os_images/' . $osImageId);
    }

    /**
     * Delete multiple OS images
     * 
     * @param array $osImageIds
     * 
     * @return array
     */
    public static function deleteMultiple(array $osImageIds): array {
        return self::getClient()->deleteMultiple('/os_images', [
            'ids' => $osImageIds
        ]);
    }

}