<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendEmailJob;
use App\Jobs\SendMailSuccess;

class queueSendMail extends Command
{
    protected $signature = 'queueSendMail';

    protected $description = 'Sao lưu cơ sở dữ liệu và gửi thông báo qua email';

    public function handle()
    {
        // Code thực hiện sao lưu database ở đây

        // Chuẩn bị dữ liệu và dispatch job gửi email
        $data = ['name' => 'Nguyễn Thị Hoài'];
        SendMailSuccess::dispatch($data);

        $this->info('Job đã được đưa vào hàng đợi!');
    }
}
