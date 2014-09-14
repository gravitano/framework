<?php namespace Gravitano\Twig;

use Gravitano\Support\ServiceProvider;

class TwigServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->register('twig', function ($app)
        {
            $paths = $app['config']->get('twig.paths');

            $options = $app['config']->get('twig.options');

            return new Twig($paths, $options);
        });
    }

}