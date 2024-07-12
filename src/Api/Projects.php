<?php

namespace Evotic\SolusSDK\Api;

use Evotic\SolusSDK\SolusClient;

class Projects {

    private $client;

    public function __construct(SolusClient $client) {
        $this->client = $client;
    }

    /**
     * List all projects
     * 
     * @return array
     */
    public function list(): array {
        return $this->client->get('/projects');
    }

}