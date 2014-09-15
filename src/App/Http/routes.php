<?php

router()->get('/', 'HomeController@index');

router()->get('/exception', function ()
{
	throw new Exception("Error Processing Request");
});