<?php
  
namespace App\Console;
  
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Task;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;
  
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\DatabaseBackUp'
    ];
  
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /* Get all tasks from the database */
        $tasks = Task::all();
  
        foreach ($tasks as $task) {
  
            $frequency = $task->frequency;
  
            $schedule->call(function() use($task) {
                /*  Run your task here */
                FacadesLog::info($task->title.' '.\Carbon\Carbon::now());
            })->$frequency();
        }
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

