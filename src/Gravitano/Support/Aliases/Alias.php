<?php namespace Gravitano\Support\Aliases;

use Gravitano\Foundation\Application;
use Instantiator\Exception\InvalidArgumentException;

abstract class Alias {

	protected static $app;

	public static function setApplication(Application $app)
	{
		static::$app = $app;
	}

	public static function getApplication()
	{
		return static::$app;
	}

    protected static function getComponentName()
    {
        throw new InvalidArgumentException("Please provide a correct component alias name.");
    }

    public static function __callStatic($name, $arguments)
    {
        $app = static::$app;

        $component = static::getComponentName();

        if($app->offsetExists($component))
        {
            return call_user_func_array([$app[$component], $name], $arguments);
        }

        $self = new static($app);

        return forward_static_call_array([$self, $name], $arguments);
    }

}