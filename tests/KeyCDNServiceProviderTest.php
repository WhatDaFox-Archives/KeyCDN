<?php

namespace KeyCDN\Tests;

use KeyCDN\KeyCDN;

/**
 * Class KeyCDNServiceProviderTest
 * @package KeyCDN\Tests
 */
class KeyCDNServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_load_the_configuration()
    {
        $this->assertEquals('KEYCDN_KEY', config('keycdn.key'));
    }

    /** @test */
    public function it_can_register_the_service_provider()
    {
        $this->assertInstanceOf(KeyCDN::class, $this->app->make(KeyCDN::class));
    }
}