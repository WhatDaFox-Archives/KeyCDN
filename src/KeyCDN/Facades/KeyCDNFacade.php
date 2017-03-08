<?php

namespace KeyCDN\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class KeyCDN
 * @package KeyCDN\Facades
 */
class KeyCDN extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'keycdn';
    }
}