<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
         $details=[
            'title'=>'Dear Customer',
            'body'=>"Thank's, your flight ticket order successfull"
        ];
        Mail::to('admin@ticket.com')->send(new OrderMail($details));
        return "Send Mail";
    }
}
