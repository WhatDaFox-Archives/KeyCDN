<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ReportsCollection;

/**
 * Class StatusAdapter
 * @package KeyCDN
 */
class StatusAdapter extends AdapterAbstract
{
    /**
     * @param $start
     * @param $end
     * @param $zoneId
     * @return string
     */
    public function all($start, $end, $zoneId)
    {
        $response = $this->client->get('reports/status.json', [
            'query' => [
                'start' => $start,
                'end' => $end,
                'zone_id' => $zoneId
            ]
        ]);

        return ReportsCollection::createFromJson($response->getBody()->getContents());
    }
}