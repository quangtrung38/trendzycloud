<?php

namespace Jacksonit\Shipping;

use Illuminate\Support\ServiceProvider;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Trung Tran <gkquangtrung@gmail.com>
 * @package quangtrung38/trendzycloud
 */
class ShippingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/config/trendzycloud.php' => config_path('trendzycloud.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('TrendzyCloud', TrendzyCloud::class);
    }
}