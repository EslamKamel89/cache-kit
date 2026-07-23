<?php

namespace IslamDev\CacheKit\Tests\Services;

use Illuminate\Support\Str;
use IslamDev\CacheKit\Attributes\Cacheable;
use IslamDev\CacheKit\Contracts\HasCacheableMethods;

class TestService implements HasCacheableMethods
{
    #[Cacheable(ttl: 1, key: 'cached-method')]
    public function getUuid(): string
    {
        return Str::uuid();
    }
}
