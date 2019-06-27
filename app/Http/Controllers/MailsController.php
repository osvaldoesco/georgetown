<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailsController extends Controller
{
  public function send(Request $request){
    $to_name = "Info";
    $to_email = env('MAIL_TO_ADDRESS');
    $from_email = env('MAIL_FROM_ADDRESS');
    $cc_email = 'info@georgetownenglish.com';
    $data = array(
      'name'=> $request->name, 
      'email' => $request->email, 
      'subject' => $request->subject,
      'course' => $request->course,
      'comment' => $request->comment
    );
        
    Mail::send('mails.contact', $data, function($message) use ($from_email, $cc_email, $to_name, $to_email) {
      $message->to($to_email, $to_name)->subject('Información GeorgeTowm');
      $message->cc($cc_email);
      $message->from($from_email, 'GeorgeTown');
    });
    return redirect('/')->with('success','Item alojado con exito');
  }
}
