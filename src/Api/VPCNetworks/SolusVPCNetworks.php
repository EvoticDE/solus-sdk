<?php

namespace Evotic\SolusSDK\Api\VPCNetworks;

use Evotic\SolusSDK\SolusClient;

class SolusVPCNetworks {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all VPC networks
     *
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('/vpc_networks');
    }

    /**
     * Get a VPC network by ID
     *
     * @param int $vpcNetworkId
     *
     * @return array
     */
    public static function get(int $vpcNetworkId): array {
        return self::getClient()->get('/vpc_networks/' . $vpcNetworkId);
    }

    /**
     * Create a VPC network
     *
     * @param string $name
     * @param string $from
     * @param string $to
     * @param int $location_id
     * @param int $user_id
     * @param string $netmask
     * @param string $list_type
     *
     * @return array
     */
    public static function create(string $name, string $from, string $to, int $location_id, int $user_id, string $netmask = "255.255.255.0", string $list_type = "range"): array {
        return self::getClient()->post('/vpc_networks', [
            'name' => $name,
            'list_type' => $list_type,
            'from' => $from,
            'to' => $to,
            'netmask' => $netmask,
            'location_id' => $location_id,
            'user_id' => $user_id
        ]);
    }

    /**
     * Update a VPC network
     *
     * @param int $vpcNetworkId
     * @param string $name
     * @param string $from
     * @param string $to
     * @param int $location_id
     * @param int $user_id
     * @param string $netmask
     *
     * @return array
     */
    public static function update(int $vpcNetworkId, string $name, string $from, string $to, int $location_id, int $user_id, string $netmask = "255.255.255.0"): array {
        return self::getClient()->put('/vpc_networks/' . $vpcNetworkId, [
            'name' => $name,
            'from' => $from,
            'to' => $to,
            'netmask' => $netmask,
            'location_id' => $location_id,
            'user_id' => $user_id
        ]);
    }

    /**
     * Delete a VPC network
     *
     * @param int $vpcNetworkId
     *
     * @return array
     */
    public static function delete(int $vpcNetworkId): array {
        return self::getClient()->delete('/vpc_networks/' . $vpcNetworkId);
    }

    /**
     * Add an IP to a VPC network
     *
     * @param int $vpcNetworkId
     * @param string $ip
     *
     * @return array
     */
    public static function addIp(int $vpcNetworkId, string $ip): array {
        return self::getClient()->post('/vpc_networks/' . $vpcNetworkId . '/add_ip', [
            'ip' => $ip
        ]);
    }

    /**
     * Add IPs to a VPC network
     *
     * @param int $vpcNetworkId
     * @param array $ips
     *
     * @return array
     */
    public static function addIps(int $vpcNetworkId, array $ips): array {
        return self::getClient()->post('/vpc_networks/' . $vpcNetworkId . '/add_ips', [
            'ips' => $ips
        ]);
    }

    /**
     * Attach servers to a VPC network
     *
     * @param int $vpcNetworkId
     * @param array $serverIds
     *
     * @return array
     */
    public static function attchServers(int $vpcNetworkId, array $serverIds): array {
        return self::getClient()->post('/vpc_networks/' . $vpcNetworkId . '/attach', [
            'server_ids' => $serverIds
        ]);
    }

    /**
     * Detach servers from a VPC network
     *
     * @param int $vpcNetworkId
     * @param array $serverIds
     *
     * @return array
     */
    public static function detachServers(int $vpcNetworkId, array $serverIds): array {
        return self::getClient()->post('/vpc_networks/' . $vpcNetworkId . '/detach', [
            'server_ids' => $serverIds
        ]);
    }

    /**
     * List all IPs in a VPC network
     *
     * @param int $vpcNetworkId
     *
     * @return array
     */
    public static function listIps(int $vpcNetworkId): array {
        return self::getClient()->get('/vpc_networks/' . $vpcNetworkId . '/ips');
    }

    /**
     * Delete an IP from a VPC network
     *
     * @param int $vpcNetworkId
     * @param string $ipId
     *
     * @return array
     */
    public static function deleteIp(int $vpcNetworkId, string $ipId): array {
        return self::getClient()->delete('/vpc_networks/' . $vpcNetworkId . '/ip/' . $ipId);
    }

    /**
     * Delete IPs from a VPC network
     *
     * @param int $vpcNetworkId
     * @param array $ipIds
     *
     * @return array
     */
    public static function deleteIps(int $vpcNetworkId, array $ipIds): array {
        return self::getClient()->deleteMultiple('/vpc_networks/' . $vpcNetworkId . '/ips', [
            'ids' => $ipIds
        ]);
    }

}