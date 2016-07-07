<?php

namespace Iyexpert\I2Geo;

use Illuminate\Support\ServiceProvider;

class I2GeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/i2geo.php' => config_path('i2geo.php')
        ]);
        
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Iyexpert\I2Geo\I2GeoInterface', '\Iyexpert\I2Geo\I2Geo');
        $this->app->alias('Iyexpert\I2Geo\I2GeoInterface', 'i2geo');
    }
}
