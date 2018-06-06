<?php

namespace Statamic\Addons\CacheCrashie;

use Statamic\Extend\Tasks;
use Illuminate\Console\Scheduling\Schedule;

class CacheCrashieTasks extends Tasks
{
    /**
     * Define the task schedule
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    public function schedule(Schedule $schedule)
    {
        $schedule->command('cache-crashie:recover')->everyFiveMinutes();
    }
}
