<?php  namespace Gravitano\Config;

class Loader {

    protected $path;

    const EXT = '.php';

    public function __construct($path = null)
    {
        $this->path = $path;
    }

    public function exists()
    {
        return is_dir($this->path);
    }

    public function explode($name)
    {
        return explode('.', $name);
    }

    public function getName($name)
    {
        if( ! strpos($name, '.'))
            return $name;

        $explodedArray = $this->explode($name);

        return $explodedArray[0];
    }

    public function getKey($name)
    {
        $explodedArray = $this->explode($name);

        return $explodedArray[1];
    }

    public function load($name)
    {
        $name = $this->getName($name);

        return require $this->path . DIRECTORY_SEPARATOR . $name . self::EXT;
    }

} 