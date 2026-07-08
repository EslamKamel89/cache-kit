<?php

namespace IslamDev\CacheKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IslamDev\CacheKit\Commands\CacheKitCommand;

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
}
