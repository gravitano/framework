<?php namespace Gravitano\Routing;

use Gravitano\Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->register('router', function($app)
        {
            return new Router($app['request']);
        });
    }

}