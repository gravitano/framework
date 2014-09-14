<?php namespace Gravitano\Foundation;

use Closure;
use ArrayAccess;
use Gravitano\Http\Response;

class Application implements ArrayAccess {

	protected $paths = [];

	protected $components = [];

    public function make($name)
    {
        if($name == 'path') return $this->paths;

        if($name instanceof Closure)
        {
            return call_user_func($name, $this);
        }

        return $this->components[$name];
    }

	public function setPaths(array $paths)
	{
		$this->paths = $paths;

		return $this;
	}

	public function path($key, $default = null)
	{
		return isset($this->paths[$key]) ? $this->paths[$key] : $default;
	}

    public function registerCoreProviders()
    {
        $providers = $this['config']->get('app.providers');

        foreach($providers as $provider)
        {
            $this->registerProvider($provider);
        }
    }

	public function run()
	{
        return new Response($this['router']->run());
	}

	public function offsetExists($key)
	{
		return isset($this->components[$key]);
	}

	public function offsetSet($key, $value)
	{
		$this->register($key, $value);
	}

	public function offsetGet($key)
	{
        return $this->make($key);
	}
	
	public function offsetUnset($key)
	{
		unset($this->components[$key]);
	}

    public function register($key, Closure $callback)
    {
        $this->components[$key] = call_user_func($callback, $this);
    }

    public function instance($key, $instance)
    {
        $this->components[$key] = $instance;
    }

    public function registerProvider($provider)
    {
        $provider = new $provider($this);

        $provider->register();
    }

    public function bootProvider($provider)
    {
        $provider = new $provider($this);

        $provider->boot();
    }

}
