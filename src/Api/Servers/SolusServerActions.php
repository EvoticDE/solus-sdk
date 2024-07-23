<?php

namespace Evotic\SolusSDK\Api\Servers;

use Evotic\SolusSDK\Interfaces\Servers\ISolusServerResizeOptions;
use Evotic\SolusSDK\SolusClient;

class SolusServerActions {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * Starts a server
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function startServer(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/start');
    }
    
    /**
     * Restarts a server
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function restartServer(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/restart');
    }
    
    /**
     * Stops a server
     * 
     * @param int $serverId
     * @param bool $force
     * 
     * @return array
     */
    public static function stopServer(int $serverId, bool $force = false): array {
        return self::getClient()->post('/servers/' . $serverId . '/stop', [
            'force' => $force
        ]);
    }

    /**
     * Suspends a server
     * Note: a suspended server cannot be started (it's like a block)
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function suspendServer(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/suspend');
    }

    /**
     * Resumes a server
     * Note: it will be resumed from the suspended state (if it was suspended)
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function resumeServer(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/resume');
    }

    /**
     * Resets the network usage limits of a server.
     * This deletes the information about the network traffic of the server.
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function resetNetworkUsageLimits(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/reset_usage');
    }


    /**
     * Resets the root password of a server
     * 
     * @param int $serverId
     * @param bool $sendPasswordToCurrentUser
     * 
     * @return array
     */
    public static function resetRootPassword(int $serverId, bool $sendPasswordToCurrentUser = false): array {
        return self::getClient()->post('/servers/' . $serverId . '/reset_password', [
            'send_password_to_current_user' => $sendPasswordToCurrentUser
        ]);
    }

    /**
     * Connect to the VNC of a server
     * 
     * @param int $serverId
     * 
     * @return array
     */
    public static function connectToVNC(int $serverId): array {
        return self::getClient()->post('/servers/' . $serverId . '/vnc_up');
    }

    /**
     * Resize a server
     * 
     * @param int $serverId
     * @param ISolusServerResizeOptions $options
     * 
     * @return array
     */
    public static function resize(int $serverId, ISolusServerResizeOptions $options): array {
        $data = [];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->post('/servers/' . $serverId . '/resize', $data);
    }

}