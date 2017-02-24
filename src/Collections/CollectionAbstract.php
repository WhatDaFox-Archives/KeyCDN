<?php

namespace KeyCDN\Collections;

use Illuminate\Support\Collection;

/**
 * Class CollectionAbstract
 * @package KeyCDN\Collections
 */
abstract class CollectionAbstract extends Collection
{
    public abstract static function createFromJson($json);
}