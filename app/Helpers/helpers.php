<?php

use App\Mail\CareerMail;
use App\Mail\EnquiryMail;
use App\Mail\SupportMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// global mail function for sending mails
function sendEnquiryMail($mail_to, $mail_subject, $mail_body, $mail_to_name, $attachments = null, $cc = [], $bcc = [])
{
    $body_string = $mail_body;
    $to_mail = $mail_to;
    $to_name = $mail_to_name;
    $subject = $mail_subject;
    Mail::mailer('smtp')->to($to_mail, $to_name)->cc(['soumyamanna180898@gmail.com'])->bcc($bcc)->send(new EnquiryMail($body_string, $subject));
}
function sendSupportMail($mail_to, $mail_subject, $mail_body, $mail_to_name, $attachments = null, $cc = [], $bcc = [])
{
    $body_string = $mail_body;
    $to_mail = $mail_to;
    $to_name = $mail_to_name;
    $subject = $mail_subject;
    Mail::mailer('smtp2')->to($to_mail, $to_name)->cc($cc)->bcc($bcc)->send(new SupportMail($body_string, $subject));
}
function sendCareerMail($mail_to, $mail_subject, $mail_body, $mail_to_name, $attachments = null)
{
    $body_string = $mail_body;
    $to_mail = $mail_to;
    $to_name = $mail_to_name;
    $subject = $mail_subject;
    $attachment = $attachments;
    Mail::mailer('smtp3')->to($to_mail, $to_name)->send(new CareerMail($body_string, $subject, $attachment));
}
