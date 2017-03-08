<?php

namespace KeyCDN\Collections;

use KeyCDN\Items\Zone;;

/**
 * Class ZonesCollection
 * @package KeyCDN\Collections
 */
class ZonesCollection extends CollectionAbstract
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

        $collection = new static($json['data']['zones']);

        return $collection->transform(function ($zone) {
            return new Zone($zone);
        });
    }
}