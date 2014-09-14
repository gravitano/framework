<?php  namespace Gravitano\Config;

class Factory {

    protected $loader;

    public function __construct(Loader $loader)
    {
        $this->loader = $loader;
    }

    public function get($key, $default = null)
    {
        $config = $this->loader->load($key);

        $key = $this->loader->getKey($key);

        return isset($config[$key]) ? $config[$key] : $default;
    }

} 