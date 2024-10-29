<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

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
    protected $description = 'Command này cách 2 phút sẽ gửi 1 mail.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = array('name' => "Nguyễn Thị Hoài");
        Mail::send('mails.sendMail', $data, function(Message $message) use ($data){
            $message->from('nguyenhoai07122004@gmail.com', 'Nguyễn Thị Hoài');
            $message->to('hoaintph36134@fpt.edu.vn', $data['name']);
            $message->subject('Đã gửi thông báo thành công!');
        });

        $this->info('Email đã được gửi đi thành công!');
    }
}
