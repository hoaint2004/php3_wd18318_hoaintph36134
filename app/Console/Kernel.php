<?php
  
namespace App\Console;

use App\Console\Commands\SendMails;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Task;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;
// use Log;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     protected $commands = [
        \App\Console\Commands\SendMails::class,
    ];

    
    protected function schedule(Schedule $schedule)
    {
        /* Get all tasks from the database */
        $schedule->command('send-mails')->everyMinute();
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

