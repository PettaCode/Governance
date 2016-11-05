<?php

namespace Support\Facades;

use Support\Facades\Facade;


/**
 * @see \Cache\CacheManager
 * @see \Cache\Repository
 */
class Cache extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'cache'; }

}
