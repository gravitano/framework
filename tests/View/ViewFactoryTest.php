<?php namespace Tests\View;

use Mockery as m;
use Gravitano\View\Factory;

class ViewFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $config;

    protected $view;

    public function setUp()
    {
        $this->config = m::mock('Gravitano\Config\Factory');
        $this->view = new Factory($this->config);
        $this->view->setPath(__DIR__.'/resources/views');
    }

    public function test_initialize()
    {
        $this->assertInstanceOf('Gravitano\View\Factory', $this->view);
    }

    public function test_create_view()
    {
        $view = $this->view->make('hello');
        $contents = $view->render();
        $this->assertInstanceOf('Gravitano\View\View', $view);
        $this->assertEquals('Hello', $contents);
    }

    public function test_create_view_in_subfolder()
    {
        $view = $this->view->make('users.index');
        $contents = $view->render();
        $this->assertInstanceOf('Gravitano\View\View', $view);
        $this->assertEquals('All Users', $contents);
    }

    /**
     * @expectedException Gravitano\View\Exceptions\ViewNotFoundException
     */
    public function test_create_view_but_that_view_is_not_found()
    {
        $view = $this->view->make('index');
        $contents = $view->render();
        $this->assertInstanceOf('Gravitano\View\View', $view);
        $this->assertEquals('Hello', $contents);
    }

}
 