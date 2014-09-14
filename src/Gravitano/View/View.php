<?php namespace Gravitano\View;

use Gravitano\Contracts\RenderableInterface;
use Gravitano\View\Exceptions\ViewNotFoundException;

class View implements RenderableInterface {

	protected $path;

	protected $name;

	protected $data = [];

	protected $mergeData = [];

	const DS = '/';

	public function __construct($name, array $data = [], array $mergeData = [])
	{
		$this->name = $this->prepareName($name);
		$this->data = $data;
		$this->mergeData = $mergeData;
	}

	public static function make($view, array $data = [], array $mergeData = [])
	{
		return new static($view, $data, $mergeData);
	}

	protected function prepareName($name)
	{
		return str_replace('.', '/', $name);
	}

	public function setPath($path)
	{
		$this->path = realpath($path);

		return $this;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function getViewPath()
	{
		return realpath($this->path . self::DS . $this->name . $this->getFileExtension());
	}

	public function getFileExtension()
	{
		return '.php';
	}

	public function render()
	{	
		if($path = $this->getViewPath())
		{
			ob_start();

			$contents = include $path;

			return ob_get_clean();
		}

		throw new ViewNotFoundException("View [{$this->name}] not found");
	}

	public function __toString()
	{
		return $this->render();
	}

}