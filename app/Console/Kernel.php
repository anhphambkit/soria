<?php

namespace App\Console;

use App\Console\Commands\CompressImageAndRenameUtf;
use App\Console\Commands\CreateSiteMap;
use App\Console\Commands\ImportDataCityWardVietNam;
use App\Console\Commands\Maintenance;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ImportDataCityWardVietNam::class,
        Maintenance::class,
        CreateSiteMap::class,
        CompressImageAndRenameUtf::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('sitemap:create')
                  ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
