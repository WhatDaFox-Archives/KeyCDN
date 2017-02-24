<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ReportsCollection;

/**
 * Class StorageAdapter
 * @package KeyCDN
 */
class StorageAdapter extends AdapterAbstract
{
    /**
     * @param $start
     * @param $end
     * @param $zoneId
     * @return string
     */
    public function all($start, $end, $zoneId)
    {
        $response = $this->client->get('reports/storage.json', [
            'query' => [
                'start' => $start,
                'end' => $end,
                'zone_id' => $zoneId
            ]
        ]);

        return ReportsCollection::createFromJson($response->getBody()->getContents());
    }
}