<?php

namespace IslamDev\CacheKit\Commands;

use Illuminate\Console\Command;

class CacheKitCommand extends Command
{
    public $signature = 'cache-kit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
