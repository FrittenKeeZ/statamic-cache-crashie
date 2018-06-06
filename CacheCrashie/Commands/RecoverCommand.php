<?php

namespace Statamic\Addons\CacheCrashie\Commands;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Statamic\API\Cache;
use Statamic\API\Config;
use Statamic\Extend\Command;

class RecoverCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache-crashie:recover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recover cache when it has been corrupted, rendering the site inaccessible.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new GuzzleClient();
        $locales = Config::get('system.locales');
        $clear = false;
        foreach ($locales as $key => $locale) {
            // Skip if cache is already marked for clearing, or URL isn't absolute.
            if (! $clear && starts_with($locale['url'], 'http')) {
                try {
                    $client->get($locale['url']);
                } catch (GuzzleException $e) {
                    $clear = true;
                }
            }
        }

        if ($clear) {
            Cache::clear();
        }
    }
}
