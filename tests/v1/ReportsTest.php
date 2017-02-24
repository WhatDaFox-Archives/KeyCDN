<?php

namespace KeyCDN\Tests\v1;

use KeyCDN\Tests\TestCase;

/**
 * Class ReportsTest
 */
class ReportsTest extends TestCase
{
    /** @test */
    public function it_can_fetch_the_traffic_statistics()
    {
        $client = $this->fakeClient('reports/traffic');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $traffic = $keycdn->traffic(time(), time());

        $this->assertInstanceOf(\KeyCDN\Collections\ReportsCollection::class, $traffic);
        $this->assertObjectHasAttribute('items', $traffic);
        $this->assertInstanceOf(\KeyCDN\Items\Report::class, $traffic->first());
        $this->assertObjectHasAttribute('amount', $traffic->first());
        $this->assertObjectHasAttribute('timestamp', $traffic->first());
    }

    /** @test */
    public function it_can_fetch_the_storage_statistics()
    {
        $client = $this->fakeClient('reports/storage');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $storage = $keycdn->traffic(time(), time());

        $this->assertInstanceOf(\KeyCDN\Collections\ReportsCollection::class, $storage);
        $this->assertObjectHasAttribute('items', $storage);
        $this->assertInstanceOf(\KeyCDN\Items\Report::class, $storage->first());
        $this->assertObjectHasAttribute('amount', $storage->first());
        $this->assertObjectHasAttribute('timestamp', $storage->first());
    }

    /** @test */
    public function it_can_fetch_the_status_statistics()
    {
        $client = $this->fakeClient('reports/status');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $status = $keycdn->status(time(), time());

        $this->assertInstanceOf(\KeyCDN\Collections\ReportsCollection::class, $status);
        $this->assertObjectHasAttribute('items', $status);
        $this->assertInstanceOf(\KeyCDN\Items\Report::class, $status->first());
        $this->assertObjectHasAttribute('totalcachehit', $status->first());
        $this->assertObjectHasAttribute('totalcachemiss', $status->first());
        $this->assertObjectHasAttribute('totalsuccess', $status->first());
        $this->assertObjectHasAttribute('totalerror', $status->first());
        $this->assertObjectHasAttribute('timestamp', $status->first());
    }

    /** @test */
    public function it_can_fetch_the_credits_statistics()
    {
        $client = $this->fakeClient('reports/credits');

        $keycdn = new \KeyCDN\KeyCDN($client);
        $credits = $keycdn->credits(time(), time());

        $this->assertInstanceOf(\KeyCDN\Collections\ReportsCollection::class, $credits);
        $this->assertObjectHasAttribute('items', $credits);
        $this->assertInstanceOf(\KeyCDN\Items\Report::class, $credits->first());
        $this->assertObjectHasAttribute('amount', $credits->first());
        $this->assertObjectHasAttribute('timestamp', $credits->first());
    }
}