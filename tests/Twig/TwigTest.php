<?php namespace Tests\Twig;

use Mockery as m;
use Gravitano\Twig\Twig;

class TwigTest extends \PHPUnit_Framework_TestCase {

    protected $twig;

    public function setUp()
    {
        $this->twig = new Twig($this->getTwigPath(), $this->getTwigOptions());
    }

    protected function getTwigPath()
    {
        return __DIR__ . '/resources/views';
    }

    protected function getTwigOptions()
    {
        return [];
    }

    public function test_initialize()
    {
        $this->assertInstanceOf('Gravitano\Twig\Twig', $this->twig);
    }

    public function test_render_view()
    {
        $view = $this->twig->make('index.html');
        $this->assertEquals('Hello Twig!', $view);
    }

    /**
     * @expectedException \Twig_Error_Loader
     */
    public function test_render_view_but_that_file_is_not_found()
    {
        $view = $this->twig->make('hello.html');
        $this->assertEquals('Hello Twig!', $view);
    }

}
 