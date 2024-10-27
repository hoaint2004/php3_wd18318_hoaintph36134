<?php
namespace App\Mail;

use App\Jobs\sendMailable as sendMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public function guiEmail()
    {
        // $emailData = [
        //     'to' => 'hoaintph36134@fpt.edu.vn',
        //     'title' => 'Chào mừng bạn!',
        //     'message' => 'Cảm ơn bạn đã đăng ký tài khoản của chúng tôi!'
        // ];
    
        // // Đưa job vào hàng đợi để gửi email
        // SendMail::dispath($emailData);
    }

    public function build(){
        // return $this->view('mails.sendMail'); 
    }

}


?>