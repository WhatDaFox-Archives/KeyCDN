<?php

namespace KeyCDN\Tests\v1;

use KeyCDN\Tests\TestCase;

/**
 * Class ZonesTest
 */
class ZonesTest extends TestCase
{
    /** @test */
    public function it_can_fetch_the_list_of_zones()
    {
        $client = $this->fakeClient('zones/zones');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zones = $keycdn->zones()->all();

        $this->assertInstanceOf(\KeyCDN\Collections\ZonesCollection::class, $zones);
        $this->assertObjectHasAttribute('items', $zones);
        $this->assertInstanceOf(\KeyCDN\Items\Zone::class, $zones->first());
        $this->assertObjectHasAttribute('id', $zones->first());
    }

    /** @test */
    public function it_can_view_a_zone()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zones()->find(1000);

        $this->assertInstanceOf(\KeyCDN\Items\Zone::class, $zone);
    }

    /** @test */
    public function it_can_add_a_zone()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zones()->add('foobar', 'pull', 'http://foo.com');

        $this->assertInstanceOf(\KeyCDN\Items\Zone::class, $zone);
    }

    /** @test */
    public function it_can_edit_a_zone()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zone(1000)->update([
            'name' => 'bar'
        ]);

        $this->assertInstanceOf(\KeyCDN\Items\Zone::class, $zone);
//        $this->assertJsonStringEqualsJsonFile($this->getStub('projects/project'), $project->toJson());
    }

    /** @test */
    public function it_can_delete_a_zone()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zone(1000)->delete();

        $this->assertTrue($zone);
    }

    /** @test */
    public function it_can_purge_a_zone_cache()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zone(1000)->purge();

        $this->assertTrue($zone);
    }

    /** @test */
    public function it_can_purge_a_zone_url()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zone(1000)->purgeUrls([
            'http://foo.com'
        ]);

        $this->assertTrue($zone);
    }

    /** @test */
    public function it_can_purge_a_zone_tag()
    {
        $client = $this->fakeClient('zones/zone');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $zone = $keycdn->zone(1000)->purgeTags([
            'tag1', 'tag2'
        ]);

        $this->assertTrue($zone);
    }
}