<?php

namespace Evotic\SolusSDK;
use Illuminate\Support\ServiceProvider;

class SolusBaseServiceProvider extends ServiceProvider {
    
    public function boot() {
        $this->publishes([
            __DIR__ . '/../config/solussdk.php' => config_path('solussdk.php'),
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/solussdk.php', 'solussdk'
        );
    }
	
}