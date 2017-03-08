<?php

namespace KeyCDN;

use GuzzleHttp\ClientInterface;
use KeyCDN\Adapters\CreditsAdapter;
use KeyCDN\Adapters\StatusAdapter;
use KeyCDN\Adapters\StorageAdapter;
use KeyCDN\Adapters\TrafficAdapter;
use KeyCDN\Adapters\ZonesAdapter;
use KeyCDN\Adapters\ZonesAliasesAdapter;
use KeyCDN\Adapters\ZonesReferrersAdapter;
use KeyCDN\Http\Client;

/**
 * Class KeyCDN
 * @package GrowthOptimized
 */
class KeyCDN
{
    /**
     * KeyCDN API endpoint
     */
    const BASE_URI = 'https://api.keycdn.com/';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $token
     * @return static
     */
    public static function create($token)
    {
        $token = base64_encode("{$token}:");
        $headers = ['Content-Type' => 'application/json', 'Authorization' => "Basic {$token}"];

        $client = new Client([
            'base_uri' => self::BASE_URI,
            'headers' => $headers
        ]);

        return new static($client);
    }

    /**
     * @param null $zoneId
     * @return $this
     */
    public function zone($zoneId)
    {
        return new ZonesAdapter($this->client, $zoneId);
    }

    /**
     * @return ZonesAdapter
     */
    public function zones()
    {
        return new ZonesAdapter($this->client);
    }

    /**
     * @param null $zoneId
     * @return $this
     */
    public function alias($zoneId)
    {
        return new ZonesAliasesAdapter($this->client, $zoneId);
    }

    /**
     * @return ZonesAdapter
     */
    public function aliases()
    {
        return new ZonesAliasesAdapter($this->client);
    }

    /**
     * @param null $zoneId
     * @return $this
     */
    public function referrer($zoneId)
    {
        return new ZonesReferrersAdapter($this->client, $zoneId);
    }

    /**
     * @return ZonesAdapter
     */
    public function referrers()
    {
        return new ZonesReferrersAdapter($this->client);
    }

    /**
     * @param $start
     * @param $end
     * @param null $zoneId
     * @return $this
     */
    public function traffic($start, $end, $zoneId = null)
    {
        return (new TrafficAdapter($this->client))->all($start, $end, $zoneId);
    }

    /**
     * @param $start
     * @param $end
     * @param null $zoneId
     * @return $this
     */
    public function storage($start, $end, $zoneId = null)
    {
        return (new StorageAdapter($this->client))->all($start, $end, $zoneId);
    }

    /**
     * @param $start
     * @param $end
     * @param null $zoneId
     * @return $this
     */
    public function status($start, $end, $zoneId = null)
    {
        return (new StatusAdapter($this->client))->all($start, $end, $zoneId);
    }

    /**
     * @param $start
     * @param $end
     * @return $this
     */
    public function credits($start, $end)
    {
        return (new CreditsAdapter($this->client))->all($start, $end);
    }
}