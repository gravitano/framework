<?php  namespace Gravitano\Testing;

class ServiceProviderTestCase extends TestCase {

    protected $provider;

    protected $serviceProvider;

    public function setUp()
    {
        parent::setUp();
        $this->serviceProvider = new $this->provider($this->app);
    }

    public function test_initialize_service_provider()
    {
        $this->assertInstanceOf($this->provider, $this->serviceProvider);
    }

    public function test_register_the_provider()
    {
        $this->serviceProvider->register();
    }

}