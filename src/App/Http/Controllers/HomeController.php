<?php namespace App\Http\Controllers;

use Gravitano\Routing\Controller;

class HomeController extends Controller {

	public function index()
	{
		return view()->make('hello');
	}

}