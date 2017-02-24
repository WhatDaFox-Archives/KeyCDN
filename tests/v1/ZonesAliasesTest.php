<?php

namespace KeyCDN\Tests\v1;

use KeyCDN\Tests\TestCase;

/**
 * Class ZonesAliasesTest
 */
class ZonesAliasesTest extends TestCase
{
    /** @test */
    public function it_can_fetch_the_list_of_zone_aliases()
    {
        $client = $this->fakeClient('zones-aliases/zone-aliases');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $aliases = $keycdn->aliases()->all();

        $this->assertInstanceOf(\KeyCDN\Collections\ZonesAliasesCollection::class, $aliases);
        $this->assertObjectHasAttribute('items', $aliases);
        $this->assertInstanceOf(\KeyCDN\Items\ZoneAlias::class, $aliases->first());
        $this->assertObjectHasAttribute('id', $aliases->first());
    }

    /** @test */
    public function it_can_add_a_zone_alias()
    {
        $client = $this->fakeClient('zones-aliases/zone-alias');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $alias = $keycdn->aliases()->add(2001, 'assets.yourwebsite.com');

        $this->assertInstanceOf(\KeyCDN\Items\ZoneAlias::class, $alias);
    }

    /** @test */
    public function it_can_edit_a_zone_alias()
    {
        $client = $this->fakeClient('zones-aliases/zone-alias');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $alias = $keycdn->alias(2001)->update([
            'name' => 'assets.yourwebsite.com'
        ]);

        $this->assertInstanceOf(\KeyCDN\Items\ZoneAlias::class, $alias);
    }

    /** @test */
    public function it_can_delete_a_zone_alias()
    {
        $client = $this->fakeClient('zones-aliases/zone-alias');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $alias = $keycdn->alias(2001)->delete();

        $this->assertTrue($alias);
    }
}