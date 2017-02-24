<?php

namespace KeyCDN\Collections;

use KeyCDN\Items\Report;

/**
 * Class ReportsCollection
 * @package KeyCDN\Collections
 */
class ReportsCollection extends CollectionAbstract
{
    /**
     * @param $json
     * @return mixed
     */
    public static function createFromJson($json)
    {
        if (!is_array($json)) {
            $json = json_decode($json, JSON_OBJECT_AS_ARRAY);
        }

        if(empty($json['data'])) {
            return new static();
        }

        $collection = new static($json['data']['stats']);

        return $collection->transform(function ($zone) {
            return new Report($zone);
        });
    }
}