<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailable;
use App\Mail\SendMail;
use Illuminate\Mail\Mailable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendMail(){
        $data = array('name' => "Nguyễn Thị Hoài");
        Mail::send('mails.sendMail', $data, function(Message $message) use ($data){
            $message->from('nguyenhoai07122004@gmail.com', 'Nguyễn Thị Hoài');
            $message->to('hoaintph36134@fpt.edu.vn', $data['name']);
            $message->subject('Đã gửi thông báo thành công!');
        });

        return view('mails.sendMail', ['name' => $data['name']]);
    }
}
