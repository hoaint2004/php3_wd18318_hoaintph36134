<?php

namespace App\Listeners;

use App\Events\SendMailSuccess;
use App\Events\SendMailSucess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailSuccessNotification 
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMailSuccess $event): void
    {
        $data = array('name' => "Nguyễn Thị Hoài");
        Mail::send('mails.sendMail', $data, function(Message $message) use ($data){
            $message->from('nguyenhoai07122004@gmail.com', 'Nguyễn Thị Hoài');
            $message->to('hoaintph36134@fpt.edu.vn', $data['name']);
            $message->subject('Đã gửi thông báo thành công!');
        });

    }
}
