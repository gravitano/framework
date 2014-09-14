<?php namespace Gravitano\Http;

class Request {

	protected $server;

	protected $env;

	protected $files;

	protected $post;

	protected $get;

	public function __construct(array $server = [], array $env = [], array $files = [], array $post = [], array $get = [])
	{
		$this->server = $server;
		$this->env = $env;
		$this->files = $files;
		$this->post = $post;
		$this->get = $get;
	}

	public function createFromGlobals()
	{
		$this->server = $_SERVER;
		$this->env = $_ENV;
		$this->files = $_FILES;
		$this->post = $_POST;
		$this->get = $_GET;

		return $this;
	}

	public function get($type, $key = null, $default = null)
	{
		if( ! is_null($key))
		{
			return isset($this->{$type}[$key]) ? $this->{$type}[$key] : $default;
		}

		return $this->{$type};
	}

    public function pathinfo()
    {
        return $this->get('server', 'REQUEST_URI');
    }

    public function segments()
    {
        return explode(ltrim($this->pathinfo(), '/'), '/');
    }
}