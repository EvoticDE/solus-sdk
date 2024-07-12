<?php

namespace Evotic\SolusSDK;

use Illuminate\Support\ServiceProvider;
use Evotic\SolusSDK\SolusClient;

class SolusBaseServiceProvider extends ServiceProvider {
    
    public function boot() {
        $this->publishes([
            __DIR__ . '/../config/solus.php' => config_path('solus.php'),
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/solus.php', 'solus'
        );

        App::bind('SolusClient', function () {
            return new SolusClient(
                Config::get('solus.base_url'),
                Config::get('solus.token')
            );
        });
    }
	
}