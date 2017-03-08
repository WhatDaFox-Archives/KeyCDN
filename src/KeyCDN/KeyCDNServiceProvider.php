<?php

namespace KeyCDN;

use Illuminate\Support\ServiceProvider;
use KeyCDN\Facades\KeyCDN;
use KeyCDN\Facades\KeyCDNFacade;

/**
 * Class KeyCDNServiceProvider
 * @package KeyCDN
 */
class KeyCDNServiceProvider extends ServiceProvider
{
    /**
     * Register config files
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/keycdn.php' => config_path('keycdn.php'),
        ], 'keycdn');
    }

    /**
     * Register Service
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/keycdn.php', 'keycdn'
        );

        $this->app->bind(KeyCDN::class, function() {
            return KeyCDN::create(config('keycdn.key'));
        });
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return array('keycdn');
    }
}