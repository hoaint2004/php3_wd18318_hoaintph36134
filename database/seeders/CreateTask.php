<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateTask extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert(
    [
                'title' => 'It will run every minute',
                'type' => 'everyMinute',
                'frequency' => 'everyMinute'
            ],
            [
                'title' => 'It will run every five minute',
                'type' => 'everyFiveMinutes',
                'frequency' => 'everyFiveMinutes'
            ],
            [
                'title' => 'It will run daily',
                'type' => 'daily',
                'frequency' => 'daily'
            ],
            [
                'title' => 'It will run every month',
                'type' => 'monthly',
                'frequency' => 'monthly'
            ]);
    }
}               
