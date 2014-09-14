<?php namespace Gravitano\Support;

use Gravitano\Foundation\Application;

abstract class ServiceProvider {

	protected $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function boot()
	{
		
	}

	abstract public function register();

}