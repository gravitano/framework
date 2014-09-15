<?php namespace Gravitano\Exception;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Gravitano\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider {
	
	public function boot()
	{
		$whoops = $this->app['exception'];
		
		$whoops->pushHandler(new PrettyPageHandler);
		
		$whoops->register();	
	}

	public function register()
	{
		$this->app->register('exception', function ($app)
		{
			return new Run;
		});	
	}

}