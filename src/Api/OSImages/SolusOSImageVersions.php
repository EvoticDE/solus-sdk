<?php

namespace Evotic\SolusSDK\Api\OSImages;

use Evotic\SolusSDK\SolusClient;

class SolusOSImageVersions {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all OS image versions
     * 
     * @param int $osImageId
     * 
     * @return array
     */
    public static function list(int $osImageId): array {
        return self::getClient()->get('/os_images/' . $osImageId . '/versions');
    }

    /**
     * Get an OS image version by ID
     * 
     * @param int $versionId
     * 
     * @return array
     */
    public static function get(int $versionId): array {
        return self::getClient()->get('/os_image_versions/' . $versionId);
    }

    /**
     * Create an OS image version
     * 
     * @param int $osImageId
     * @param string $version
     * @param string $url
     * @param string $cloud_init_version
     * @param bool $is_visible
     * @param string $virtualization_type
     * @param array $available_plans
     * 
     * @return array
     */
    public static function create(int $osImageId, string $version, string $url, string $cloud_init_version, bool $is_visible = false, string $virtualization_type = 'kvm', array $available_plans = []): array {
        $data = [
            'version' => $version,
            'url' => $url,
            'cloud_init_version' => $cloud_init_version,
            'is_visible' => $is_visible,
            'virtualization_type' => $virtualization_type,
            'available_plans' => $available_plans
        ];

        return self::getClient()->post('/os_images/' . $osImageId . '/versions', $data);
    }

    /**
     * Update an OS image version
     * 
     * @param int $osImageVersionId
     * @param string $version
     * @param string $url
     * @param string $cloud_init_version
     * @param bool $is_visible
     * @param array $available_plans
     * 
     * @return array
     */
    public static function update(int $osImageVersionId, string $version, string $url, string $cloud_init_version, bool $is_visible = false, array $available_plans = []): array {
        $data = [
            'version' => $version,
            'url' => $url,
            'cloud_init_version' => $cloud_init_version,
            'is_visible' => $is_visible,
            'available_plans' => $available_plans
        ];

        return self::getClient()->put('/os_image_versions/' . $osImageVersionId, $data);
    }

    /**
     * Patch an OS image version
     * 
     * @param int $osImageVersionId
     * @param int $position
     * @param bool $is_visible
     * 
     * @return array
     */
    public static function patch(int $osImageVersionId, int $position, bool $is_visible = false): array {
        $data = [
            'position' => $position,
            'is_visible' => $is_visible
        ];

        return self::getClient()->patch('/os_image_versions/' . $osImageVersionId, $data);
    }

    /**
     * Delete an OS image version
     * 
     * @param int $osImageVersionId
     * 
     * @return array
     */
    public static function delete(int $osImageVersionId): array {
        return self::getClient()->delete('/os_image_versions/' . $osImageVersionId);
    }

}