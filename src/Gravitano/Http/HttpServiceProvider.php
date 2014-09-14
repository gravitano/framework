<?php  namespace Gravitano\Http;

use Gravitano\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->register('request', function($app)
        {
            $request = new Request;

            $request->createFromGlobals();

            return $request;
        });
    }

}