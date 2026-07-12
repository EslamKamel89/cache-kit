<?php

namespace IslamDev\CacheKit\Tests\Services;

use Illuminate\Support\Str;
use IslamDev\CacheKit\Contracts\HasCacheableMethods;

class TestService implements HasCacheableMethods
{
    public function getUuid(): string
    {
        return Str::uuid();
    }
}
