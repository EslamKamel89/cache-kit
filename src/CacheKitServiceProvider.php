<?php

namespace IslamDev\CacheKit;

use IslamDev\CacheKit\Commands\CacheKitCommand;
use IslamDev\CacheKit\Contracts\HasCacheableMethods;
use IslamDev\CacheKit\Tests\Services\TestService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CacheKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('cache-kit')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_cache_kit_table')
            ->hasCommand(CacheKitCommand::class);
    }

    public function bootingPackage()
    {
        $this->app->beforeResolving(function ($abstract) {
            $class = is_string($abstract) ? $abstract : get_class($abstract);
            if (! class_exists($class)) {
                return;
            }
            if (! in_array(HasCacheableMethods::class, class_implements($class) ?: [], true)) {
                return;
            }
            app()->bind(TestService::class, fn () => new class {});
        });
    }
}
