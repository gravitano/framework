<?php namespace Gravitano\Exception;

use Gravitano\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider {
	
	public function boot()
	{
		$whoops = $this->app['exception'];
		
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		
		$whoops->register();	
	}

	public function register()
	{
		$this->app->register('exception', function ($app)
		{
			return new \Whoops\Run;
		});	
	}

}