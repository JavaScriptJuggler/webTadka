<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// global mail function for sending mails
function sendMail($mail_to, $mail_subject, $mail_body, $mail_to_name, $attachments = null)
{
    $body_string = $mail_body;
    $to_mail = $mail_to;
    $to_name = $mail_to_name;
    $subject = $mail_subject;
    $data = array('body' => $body_string);
    Mail::send('mail/admin_mails', $data, function ($message) use ($to_mail, $to_name, $subject, $attachments) {
        $message->to($to_mail, $to_name);
        $message->bcc(['soumyamanna180898@gmail.com']);
        $message->subject($subject);

        if ($attachments != null) {
            foreach ($attachments as $file) {
                $message->attach($file);
            }
        }
    });
}
