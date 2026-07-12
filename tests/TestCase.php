<?php

namespace IslamDev\CacheKit\Tests;

use IslamDev\CacheKit\CacheKitServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        // Additional setup (e.g., running migrations)
    }

    protected function getPackageProviders($app)
    {
        return [
            CacheKitServiceProvider::class, // Registers your package code
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing'); // Configures in-memory DB
    }
}
