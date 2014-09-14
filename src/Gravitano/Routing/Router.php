<?php namespace Gravitano\Routing;

use Gravitano\Http\Request;
use Gravitano\Routing\Exceptions\NotFoundHttpException;

class Router {

	protected $request;

	protected $collections = [];

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function register($method, $uri, $action, array $options = [])
	{
		$method = strtoupper($method);

		$this->collections[] = new Route(compact('method', 'uri', 'action', 'options'));
	}

	public function get($uri, $action, array $options = [])
	{
		$this->register(__FUNCTION__, $uri, $action, $options);
	}

	public function run()
	{
		foreach ($this->collections as $route)
		{
            $uri = $this->request->pathinfo();

			if($route->match($uri)) return $route->getResponse();
		}

		throw new NotFoundHttpException;
	}

}