<?php

use Illuminate\Support\Facades\Cache;
use IslamDev\CacheKit\Commands\CacheKitCommand;
use IslamDev\CacheKit\Tests\Services\TestService;

it('clears all items cached by our package using artisan command', function () {
    $service = app(TestService::class);
    $uuid = $service->getUuid();
    Cache::put('some-key', 'some-value');
    $this->artisan(CacheKitCommand::class);
    expect(Cache::get('cached-method'))->toBeNull();
    expect(Cache::get('some-key'))->toBe('some-value');
});
