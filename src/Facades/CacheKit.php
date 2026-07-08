<?php

namespace IslamDev\CacheKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IslamDev\CacheKit\CacheKit
 */
class CacheKit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \IslamDev\CacheKit\CacheKit::class;
    }
}
