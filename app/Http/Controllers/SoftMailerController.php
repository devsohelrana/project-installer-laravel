<?php

namespace App\Http\Controllers;

use App\Mail\SoftMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SoftMailerController extends Controller
{
    public function mailSend(Request $request)
    {
        $to = $request->email;
        $msg = $request->message;
        $subject = $request->subject;

        Mail::to($to)->send(new SoftMailer($msg, $subject));

        return redirect()->route('mail.compose')->with('success', 'Mail Send Successfully!');
    }
}
