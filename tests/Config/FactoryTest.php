<?php namespace Tests\Config;

use Gravitano\Config\Loader;
use Gravitano\Config\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase {

    protected $loader;

    protected $config;

    public function setUp()
    {
        $this->loader = new Loader(__DIR__ . '/resources/config');
        $this->config = new Factory($this->loader);
    }

    public function test_initialize()
    {
        $this->assertInstanceOf('Gravitano\Config\Factory', $this->config);
    }

    public function test_get_config()
    {
        $this->assertEquals('John Doe', $this->config->get('test.name'));
        $this->assertEquals(123456789, $this->config->get('test.phone'));
    }
}
 