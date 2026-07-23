<?php

namespace IslamDev\CacheKit;

use Illuminate\Support\Facades\Cache;

class MethodCacheService
{
    public function flush(): void
    {
        $keys = collect(Cache::get('method-cache-keys', []));
        $keys->each(fn ($key) => Cache::forget($key));
        Cache::forget('method-cache-keys');
    }
}
