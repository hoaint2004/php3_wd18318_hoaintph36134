<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */

     
    public function handle(): void
    {
        $data = array('name' => "Nguyễn Thị Hoài");
        Mail::send('mails.sendMail', $data, function(Message $message) use ($data){
            $message->from('nguyenhoai07122004@gmail.com', 'Nguyễn Thị Hoài');
            $message->to('hoaintph36134@fpt.edu.vn', $data['name']);
            $message->subject('Đã gửi thông báo thành công!');
        });
    }
}
