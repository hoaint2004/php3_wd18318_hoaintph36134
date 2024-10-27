<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class messageLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // $signature: tên command
    protected $signature = 'messageLogin';

    /**
     * The console command description.
     *
     * @var string
     */

    //  $description: mô tả command
    protected $description = 'Command dùng để thông báo việc người dùng đăng nhập thành công.';

    /**
     * Execute the console command.
     */

    //  Phương thức  Handle() : Nơi viết logic để command thực thi
    public function handle()
    {
        $this->info('Đăng nhập thành công!');
    }
}
