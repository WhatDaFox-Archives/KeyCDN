<?php

namespace KeyCDN\Adapters;

use KeyCDN\Collections\ReportsCollection;

/**
 * Class CreditsAdapter
 * @package KeyCDN
 */
class CreditsAdapter extends AdapterAbstract
{
    /**
     * @param $start
     * @param $end
     * @return string
     */
    public function all($start, $end)
    {
        $response = $this->client->get('reports/credits.json', [
            'query' => [
                'start' => $start,
                'end' => $end
            ]
        ]);

        return ReportsCollection::createFromJson($response->getBody()->getContents());
    }
}