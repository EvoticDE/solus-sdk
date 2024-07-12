<?php

namespace Evotic\SolusSDK\Api\Projects;

use Evotic\SolusSDK\SolusClient;

class SolusProjectMembers {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all members of a project
     * 
     * @param int $projectId
     * 
     * @return array
     */
    public static function list(int $projectId): array {
        return self::getClient()->get('/projects/' . $projectId . '/members');
    }

    /**
     * Add a member to a project
     * 
     * @param int $projectId
     * @param string $email
     * 
     * @return array
     */
    public static function add(int $projectId, string $email): array {
        return self::getClient()->post('/projects/' . $projectId . '/members', [
            'email' => $email
        ]);
    }

    /**
     * Remove a member from a project
     * 
     * @param int $projectId
     * @param int $memberId
     * 
     * @return array
     */
    public static function remove(int $projectId, int $memberId): array {
        return self::getClient()->delete('/projects/' . $projectId . '/members/' . $memberId);
    }


    /**
     * Resend an invitation to a member
     * 
     * @param int $projectId
     * @param int $memberId
     * 
     * @return array
     */
    public static function resendInvitation(int $projectId, int $memberId): array {
        return self::getClient()->post('/projects/' . $projectId . '/members/' . $memberId . '/resend_invite');
    }

}