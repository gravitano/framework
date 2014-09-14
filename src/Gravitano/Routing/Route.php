<?php namespace Gravitano\Routing;

use Closure;
use Gravitano\Routing\Exceptions\InvalidRouteActionException;

class Route {

	protected $attributes = [];

	public function __construct(array $attributes)
	{
		$this->attributes = $attributes;
	}

	public function getAttribute($key, $default = null)
	{
		return isset($this->attributes[$key]) ? $this->attributes[$key] : $default;
	}

	public function match($uri)
	{
        return $this->uri == $uri;
	}

    public function getResponse()
    {
        $action = $this->action;

        if($action instanceof Closure)
        {
            return call_user_func($action, $this);
        }
        elseif(is_string($action))
        {
            list($controller, $method) = explode('@', $action);

            $controller = 'App\\Http\\Controllers\\' . $controller;

            return call_user_func_array([new $controller, $method], array());
        }

        throw new InvalidRouteActionException;
    }

	public function __get($key)
	{
		return $this->getAttribute($key);
	}
	
}