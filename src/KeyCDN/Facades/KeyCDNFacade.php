<?php

namespace KeyCDN\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class KeyCDNFacade
 * @package KeyCDN\Facades
 */
class KeyCDNFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'keycdn';
    }
}