<?php

namespace Evotic\SolusSDK;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
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
    }
	
}