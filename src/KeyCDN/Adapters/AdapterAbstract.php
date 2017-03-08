<?php

namespace KeyCDN\Adapters;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AdapterAbstract
 * @package KeyCDN\Adapters
 */
class AdapterAbstract
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $id;

    /**
     * @param ClientInterface $client
     * @param null $id
     */
    public function __construct(ClientInterface $client, $id = null)
    {
        $this->client = $client;
        $this->id = $id;
    }

    /**
     * @param $resourceId
     */
    protected function setResourceId($resourceId = null)
    {
        if (!is_null($resourceId)) {
            $this->id = $resourceId;
        }
    }

    /**
     * @return null
     */
    protected function getResourceId()
    {
        return $this->id;
    }

    /**
     * @param $time
     * @return string
     */
    protected function normalizeDate($time)
    {
        if (is_a($time, 'Carbon\\Carbon')) {
            return $time->format('Y-m-d\TH:i:s\Z');
        }

        return $time;
    }

    /**
     * @param ResponseInterface $response
     * @return bool
     */
    protected function booleanResponse(ResponseInterface $response)
    {
        if (!in_array($response->getStatusCode(), [204, 200])) {
            return false;
        }

        return true;
    }
}