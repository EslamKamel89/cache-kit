<?php

namespace IslamDev\CacheKit\Commands;

use Illuminate\Console\Command;
use IslamDev\CacheKit\Facades\MethodCache;

class CacheKitCommand extends Command
{
    public $signature = 'cache-kit:flush';

    public $description = 'Flush all items cached by our cacheable attributes';

    public function handle(): int
    {
        MethodCache::flush();
        $this->comment('All done');

        return self::SUCCESS;
    }
}
