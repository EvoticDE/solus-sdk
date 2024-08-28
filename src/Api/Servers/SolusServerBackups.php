<?php

namespace Evotic\SolusSDK\Api\Servers;

use Evotic\SolusSDK\SolusClient;

class SolusServerBackups {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all backups for a server
     *
     * @param int $server_id
     *
     * @return array
     */
    public static function list(int $server_id): array {
        return self::getClient()->get("server/$server_id/backups");
    }

    /**
     * Create a backup for a server
     *
     * @param int $server_id
     *
     * @return array
     */
    public function create(int $server_id): array {
        return self::getClient()->post("server/$server_id/backups");
    }

}
