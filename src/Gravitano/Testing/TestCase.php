<?php namespace Gravitano\Testing;

use Gravitano\Config\Loader;
use Gravitano\Config\Factory;
use Gravitano\Support\Aliases\Alias;
use Gravitano\Foundation\Application;

abstract class TestCase extends \PHPUnit_Framework_TestCase {

    protected $app;

    public function setUp()
    {
        $app = new Application();

        $app->setPaths($this->getApplicationPaths());

        Alias::setApplication($app);

        $app->instance('app', $app);

        $app->register('config', function ($app)
        {
            $loader = new Loader($app['path']['config']);

            return new Factory($loader);
        });

        $app->registerCoreProviders();

        $this->loadRoutesFile();

        $app->boot();

        $this->app = $app;
    }

    public function getApplicationPaths()
    {
        return [
            'public'	    =>	__DIR__ . '/../../../public',
            'resources'	    =>	__DIR__ . '/../../../resources',
            'src'		    =>	__DIR__ . '/../../../src',
            'app'	        =>	__DIR__ . '/../../../src/App',
            'tests'		    =>	__DIR__ . '/../../../tests',
            'config'	    =>	__DIR__ . '/../../../config',
            'controller'	=>	__DIR__ . '/../../../src/Http/Controllers',
            'model'			=>	__DIR__ . '/../../../src/Database/Models',
            'view'			=>	__DIR__ . '/../../../resources/views',
        ];
    }

    protected function loadRoutesFile()
    {
        // require something
    }

}
 