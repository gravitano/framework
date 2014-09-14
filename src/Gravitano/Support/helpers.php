<?php

function app($key)
{
	return Gravitano\Support\Aliases\App::make($key);
}

function router()
{
	return app(__FUNCTION__);
}

function request()
{
    return app(__FUNCTION__);
}

function view()
{
    return app(__FUNCTION__);
}

function twig()
{
    return app(__FUNCTION__);
}

function dd($var)
{
    die(var_dump($var));
}