<?php namespace Gravitano\View;

use Gravitano\Config\Factory as Config;

class Factory {

    protected $path;

    protected $config;

    public function __construct(Config $config, $path = null)
    {
        $this->config = $config;
        $this->path = $path;
    }

    public function make($view, array $data = [], array $mergeData = array())
    {
        return View::make($view, $data, $mergeData)->setPath($this->getPath());
    }

    public function getPath()
    {
        return $this->path ?: $this->config->get('view.path');
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

} 