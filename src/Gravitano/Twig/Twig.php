<?php namespace Gravitano\Twig;

use Twig_Environment;
use Twig_Loader_Filesystem;

class Twig {

    protected $path = [];

    protected $options = [];

    public function __construct($path, array $options = [])
    {
        $this->path = $path;
        $this->options = $options;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function addPath($path)
    {
        $this->path[] = $path;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    protected function getOptions()
    {
        return $this->options;
    }

    public function make($view, array $data = [])
    {
        $loader = new Twig_Loader_Filesystem($this->getPath());

        $twig = new Twig_Environment($loader, $this->getOptions());

        return $twig->render($view, $data);
    }

} 