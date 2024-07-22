<?php

namespace Evotic\SolusSDK\Api\Servers;
use Evotic\SolusSDK\Interfaces\Servers\ISolusServerCreateOptions;
use Evotic\SolusSDK\Interfaces\Servers\ISolusServerUpdateOptions;
use Evotic\SolusSDK\SolusClient;

class SolusServers {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all servers
     * 
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('/servers');
    }

    /**
     * Get a server by ID
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function get(int $serverId): array {
        return self::getClient()->get('/servers/' . $serverId);
    }


    /**
     * Create a server (quick)
     * It is a quick way of creating a server compared with the Create a Server Under a Project API request. 
     * You only need to provide a server name while other settings (a compute resource, a plan, an OS, and so on) are optional. 
     * If you do not submit them, our service will create a server with the default settings defined by the administrator.
     * 
     * @param int $serverId
     * @param ISolusServerCreateOptions $options
     * 
     * @return array
     */
    public static function create(string $name, ISolusServerCreateOptions $options): array {
        $data = [
            'name' => $name
        ];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->post('/servers', $data);
    }

    /**
     * Delete a server
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function delete(int $serverId): array {
        return self::getClient()->delete('/servers/' . $serverId);
    }

    /**
     * Update a server
     * 
     * @param int $serverId
     * @param ISolusServerUpdateOptions $options
     * 
     * @return array
     */
    public static function update(int $serverId, ISolusServerUpdateOptions $options): array {
        $data = $options->toArray();

        return self::getClient()->put('/servers/' . $serverId, $data);
    }

    /**
     * Install Guest Tools on a server
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function installGuestTools(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/install_guest_tools');
    }

    /**
     * Update the primary IP address of a server
     * 
     * @param int $serverId
     * @param string $ip
     * 
     * @return array
     */
    public static function updateServerIpAdress(int $serverId, string $ip): array {
        return self::getClient()->post('/servers/' . $serverId . '/update_ip', [
            'ip' => $ip
        ]);
    }

    /**
     * Create a additional IP address for a server
     * 
     * @param int $serverId
     * @param int $count
     * @param string $type
     * @param string $ip
     * @param bool $delayed
     * 
     * @return array
     */
    public static function createServerAdditionalIpAddress(int $serverId, int $count, string $type, string $ip, bool $delayed) {
        return self::getClient()->post('/servers/' . $serverId . '/additional_ip', [
            'count' => $count,
            'type' => $type,
            'ip' => $ip,
            'delayed' => $delayed
        ]);
    }

    /**
     * Reinstall a server
     * 
     * @param int $serverId
     * @param int $os
     * @param array $application
     * @param array $application_data
     * @param array $ssh_keys
     * @param array $user_data
     * 
     * @return array
     */
    public static function reinstallServer(int $serverId, int $os, ?int $application, ?array $application_data, ?array $ssh_keys, ?string $user_data) {
        $data = [
            'os' => $os,
            ...($application ? ['application' => $application] : []),
            ...($application_data ? ['application_data' => $application_data] : []),
            ...($ssh_keys ? ['ssh_keys' => $ssh_keys] : []),
            ...($user_data ? ['user_data' => $user_data] : [])
        ];

        return self::getClient()->post('/servers/' . $serverId . '/reinstall', $data);
    }

    /**
     * Delete multiple additional IP addresses
     * 
     * @param int $serverId
     * @param array $ids
     * @param bool $delayed
     * 
     * @return array
     */
    public static function deleteMultipleAdditionalIps(int $serverId, array $ids, bool $delayed) {
        return self::getClient()->post('/servers/' . $serverId . '/delete_additional_ips', [
            'ids' => $ids,
            'delayed' => $delayed
        ]);
    }

    /**
     * Delete additional IP address
     * 
     * @param int $serverId
     * @param int $ipId
     * @return array
     */
    public static function deleteAdditionalIps(int $serverId, int $ipId) {
        return self::getClient()->delete('/servers/' . $serverId . '/additional_ip/' . $ipId);
    }

}