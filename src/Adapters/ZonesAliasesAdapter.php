<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ZonesAliasesCollection;
use KeyCDN\Items\ZoneAlias;

/**
 * Class ZonesAliasesAdapter
 * @package KeyCDN
 */
class ZonesAliasesAdapter extends AdapterAbstract
{
    /**
     * @return string
     */
    public function all()
    {
        $response = $this->client->get('zonealiases.json');

        return ZonesAliasesCollection::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param $zoneId
     * @param $name
     * @return ZoneAlias
     */
    public function add($zoneId, $name)
    {
        $response = $this->client->post('zonealiases.json', [
            'zone_id' => $zoneId,
            'name' => $name
        ]);

        return ZoneAlias::createFromJson($response->getBody()->getContents(), 'zonealias');
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->put("zonealiases/{$this->getResourceId()}.json", $attributes);

        return ZoneAlias::createFromJson($response->getBody()->getContents(), 'zonealias');
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("zonealiases/{$this->getResourceId()}.json");

        return $this->booleanResponse($response);
    }
}