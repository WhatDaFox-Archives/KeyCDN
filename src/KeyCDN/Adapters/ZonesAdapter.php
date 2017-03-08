<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ZonesCollection;
use KeyCDN\Items\Zone;

/**
 * Class ZonesAdapter
 * @package KeyCDN
 */
class ZonesAdapter extends AdapterAbstract
{
    /**
     * @return string
     */
    public function all()
    {
        $response = $this->client->get('zones.json');

        return ZonesCollection::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $zoneId
     * @return static
     */
    public function find($zoneId = null)
    {
        $this->setResourceId($zoneId);

        $response = $this->client->get("zones/{$this->getResourceId()}.json");

        return Zone::createFromJson($response->getBody()->getContents(), 'zone');
    }

    /**
     * @param $name
     * @param $type
     * @param $originurl
     * @param array $attributes
     * @return Zone
     */
    public function add($name, $type, $originurl = '', array $attributes = [])
    {
        $attributes = array_merge($attributes, compact('name', 'type', 'originurl'));

        $response = $this->client->post('zones.json', $attributes);

        return Zone::createFromJson($response->getBody()->getContents(), 'zone');
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->put("zones/{$this->getResourceId()}.json", $attributes);

        return Zone::createFromJson($response->getBody()->getContents(), 'zone');
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("zones/{$this->getResourceId()}.json");

        return $this->booleanResponse($response);
    }

    /**
     * @param array $urls
     * @param bool $tags
     * @return static
     */
    public function purge(array $urls = [], $tags = false)
    {
        if(!empty($urls)) {
            if($tags) {
                return $this->purgeTags($urls);
            }

            return $this->purgeUrls($urls);
        }

        $response = $this->client->get("zones/purge/{$this->getResourceId()}.json");

        return $this->booleanResponse($response);
    }

    /**
     * @param array $urls
     * @return bool
     */
    public function purgeUrls(array $urls)
    {
        $response = $this->client->delete("zones/purgeurl/{$this->getResourceId()}.json", compact('urls'));

        return $this->booleanResponse($response);
    }

    /**
     * @param array $tags
     * @return bool
     */
    public function purgeTags(array $tags)
    {
        $response = $this->client->delete("zones/purgetag/{$this->getResourceId()}.json", compact('tags'));

        return $this->booleanResponse($response);
    }
}