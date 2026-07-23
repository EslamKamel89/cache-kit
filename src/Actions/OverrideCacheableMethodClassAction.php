<?php

namespace IslamDev\CacheKit\Actions;

use ChristophRumpel\MethodOverrider\MethodOverrider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use IslamDev\CacheKit\Attributes\Cacheable;
use ReflectionClass;

class OverrideCacheableMethodClassAction
{
    public function handle(string $class)
    {
        $reflection = new ReflectionClass($class);
        $methods = $reflection->getMethods();
        $methodToOverride = collect($methods)->firstWhere(function ($method) {
            return count($method->getAttributes(Cacheable::class)) > 0;
        });
        $attribute = $methodToOverride->getAttributes(Cacheable::class)[0];
        $cacheableInstance = $attribute->newInstance();

        $methodImplementation = function ($original) use ($cacheableInstance) {
            return Cache::remember(
                key: $cacheableInstance->key,
                ttl: $cacheableInstance->ttl,
                callback : fn () => $original()
            );
        };
        $methodOverrider = app(MethodOverrider::class);
        $result = $methodOverrider->generateOverriddenClass(
            class: $class,
            methodNames: $methodToOverride->name,
            implementations: $methodImplementation,
        );
        $filePath = storage_path('framework/cache/'.$result['className'].'.php');
        File::put($filePath, $result['content']);
        try {
            require_once $filePath;
            $className = $result['className'];
            $overriddenClassInstance = new $className($result['implementations']);
            // $overriddenClassInstance = new $className([$methodImplementation]);
        } finally {
            File::delete($filePath);
        }
        app()->bind($class, fn () => $overriddenClassInstance);
    }
}
