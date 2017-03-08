<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ZonesReferrersCollection;
use KeyCDN\Items\ZoneReferrer;

/**
 * Class ZonesReferrersAdapter
 * @package KeyCDN
 */
class ZonesReferrersAdapter extends AdapterAbstract
{
    /**
     * @return string
     */
    public function all()
    {
        $response = $this->client->get('zonereferrers.json');

        return ZonesReferrersCollection::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $zoneId
     * @param $name
     * @return ZoneAlias
     */
    public function add($zoneId, $name)
    {
        $response = $this->client->post('zonereferrers.json', [
            'zone_id' => $zoneId,
            'name' => $name
        ]);

        return ZoneReferrer::createFromJson($response->getBody()->getContents(), 'zonereferrer');
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->put("zonereferrers/{$this->getResourceId()}.json", $attributes);

        return ZoneReferrer::createFromJson($response->getBody()->getContents(), 'zonereferrer');
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("zonereferrers/{$this->getResourceId()}.json");

        return $this->booleanResponse($response);
    }
}