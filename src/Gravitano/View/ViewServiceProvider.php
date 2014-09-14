<?php namespace Gravitano\View;

use Gravitano\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->register('view', function($app)
        {
            return new Factory($app['config']);
        });
    }

}