<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command dùng để thông báo việc gửi mail thành công.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Gửi Mail thành công!');

    }
}
