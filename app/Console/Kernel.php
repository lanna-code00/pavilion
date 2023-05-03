<?php

namespace App\Console;

use App\Models\User;
use App\Notifications\ProfilingNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        'App\Console\Commands\SendProfileImageUploadReminder'
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly()

        // $schedule->call(function () {
        //     Log::info('This is a testing task!');
        // })->everyMinute();

        $schedule->command('users:send-profile-image-upload-reminder')->cron('0 */72 * * *'); //runs every 72 hour thats three days

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
