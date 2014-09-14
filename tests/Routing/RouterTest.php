<?php namespace Tests\Routing;

use Mockery as m;
use Gravitano\Routing\Router;
use PHPUnit_Framework_TestCase;

class RouterTest extends PHPUnit_Framework_TestCase {

    protected $request;

    protected $router;

    public function setUp()
    {
        $this->request = m::mock('Gravitano\Http\Request');
        $this->router = new Router($this->request);
    }

    public function test_initialize()
    {
        $this->assertInstanceOf('Gravitano\Routing\Router', $this->router);
    }
    
}
 