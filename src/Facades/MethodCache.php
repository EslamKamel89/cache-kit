<?php

namespace IslamDev\CacheKit\Facades;

use Illuminate\Support\Facades\Facade;
use IslamDev\CacheKit\MethodCacheService;

class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MethodCacheService::class;
    }
}
