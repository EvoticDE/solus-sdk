<?php

namespace Evotic\SolusSDK\Api\Plans;

use Evotic\SolusSDK\Interfaces\Plans\ISolusPlanCreateOptions;
use Evotic\SolusSDK\Interfaces\Plans\ISolusPlanPatchOptions;
use Evotic\SolusSDK\Interfaces\Plans\ISolusPlanUpdateOptions;
use Evotic\SolusSDK\SolusClient;

class SolusPlans {

    private static function getClient(): SolusClient {
        return SolusClient::getInstance();
    }

    /**
     * List all plans
     * 
     * @return array
     */
    public static function list(): array {
        return self::getClient()->get('/plans');
    }

    /**
     * Get a plan by ID
     * 
     * @param int $planId
     * 
     * @return array
     */
    public static function get(int $planId): array {
        return self::getClient()->get('/plans/' . $planId);
    }

    /**
     * Create a plan
     * 
     * @param string $name
     * @param ISolusPlanCreateOptions $options
     * 
     * @return array
     */
    public static function create(string $name, ISolusPlanCreateOptions $options): array {
        $data = [
            'name' => $name
        ];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->post('/plans', $data);
    }

    /**
     * Delete a plan
     * 
     * @param int $planId
     * 
     * @return array
     */
    public static function delete(int $planId): array {
        return self::getClient()->delete('/plans/' . $planId);
    }

    /**
     * Delete multiple plans
     * 
     * @param array $planIds
     * 
     * @return array
     */
    public static function deleteMultiple(array $planIds): array {
        return self::getClient()->deleteMultiple('/plans', ['ids' => $planIds]);
    }

    /**
     * Update a plan
     * 
     * @param int $planId
     * @param ISolusPlanUpdateOptions $options
     * 
     * @return array
     */
    public static function update(int $planId, ISolusPlanUpdateOptions $options): array {
        $data = [];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->put('/plans/' . $planId, $data);
    }

    /**
     * Patch a plan
     * 
     * @param int $planId
     * @param ISolusPlanPatchOptions $options
     * 
     * @return array
     */
    public static function patch(int $planId, ISolusPlanPatchOptions $options): array {
        $data = [];

        if ($options !== null) {
            $data = array_merge($data, $options->toArray());
        }

        return self::getClient()->patch('/plans/' . $planId, $data);
    }

}