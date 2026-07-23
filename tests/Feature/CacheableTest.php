<?php

use Illuminate\Support\Facades\Cache;
use IslamDev\CacheKit\Tests\Services\TestService;

it('caches a specific method', function () {
    $service = app(TestService::class);
    $uuid = $service->getUuid();
    expect($service->getUuid())->toBe($uuid);
    expect($service->getUuid())->toBe($uuid);
    sleep(1);
    expect($service->getUuid())->not()->toBe($uuid);

});

it('caches a cacheable method under the right key', function () {
    expect(Cache::get('cached-method'))->toBeNull();
    $service = app(TestService::class);
    $service->getUuid();
    expect(Cache::get('cached-method'))->not()->toBeNull();
});
