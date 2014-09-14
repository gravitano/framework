<?php

use Gravitano\Config\Loader;
use Gravitano\Config\Factory;

Gravitano\Support\Aliases\Alias::setApplication($app);

$app->instance('app', $app);

$app->register('config', function ($app)
{
    $loader = new Loader($app['path']['config']);

    return new Factory($loader);
});

$app->registerCoreProviders();

require $app['path']['app'] . '/Http/routes.php';