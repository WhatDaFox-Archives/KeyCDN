<?php

namespace KeyCDN\Tests\v1;

use KeyCDN\Tests\TestCase;

/**
 * Class ZonesReferrersTest
 */
class ZonesReferrersTest extends TestCase
{
    /** @test */
    public function it_can_fetch_the_list_of_zone_referrers()
    {
        $client = $this->fakeClient('zones-referrers/zone-referrers');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $referrers = $keycdn->referrers()->all();

        $this->assertInstanceOf(\KeyCDN\Collections\ZonesReferrersCollection::class, $referrers);
        $this->assertObjectHasAttribute('items', $referrers);
        $this->assertInstanceOf(\KeyCDN\Items\ZoneReferrer::class, $referrers->first());
        $this->assertObjectHasAttribute('id', $referrers->first());
    }

    /** @test */
    public function it_can_add_a_zonreferrer()
    {
        $client = $this->fakeClient('zones-referrers/zone-referrer');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $referrer = $keycdn->referrers()->add(2001, 'assets.yourwebsite.com');

        $this->assertInstanceOf(\KeyCDN\Items\ZoneReferrer::class, $referrer);
    }

    /** @test */
    public function it_can_edit_a_zonreferrer()
    {
        $client = $this->fakeClient('zones-referrers/zone-referrer');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $referrer = $keycdn->referrer(2001)->update([
            'name' => 'assets.yourwebsite.com'
        ]);

        $this->assertInstanceOf(\KeyCDN\Items\ZoneReferrer::class, $referrer);
    }

    /** @test */
    public function it_can_delete_a_zonreferrer()
    {
        $client = $this->fakeClient('zones-referrers/zone-referrer');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $referrer = $keycdn->referrer(2001)->delete();

        $this->assertTrue($referrer);
    }
}