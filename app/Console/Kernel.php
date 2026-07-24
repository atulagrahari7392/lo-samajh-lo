<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Generate daily current affairs draft every day at 6:00 AM
        $schedule->command('lsl:generate-current-affairs')->dailyAt('06:00');
        
        // Send class reminders every 15 minutes
        $schedule->command('lsl:send-class-reminders')->everyFifteenMinutes();
        
        // Clean up old temporary files
        $schedule->command('cache:prune-stale-tags')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
