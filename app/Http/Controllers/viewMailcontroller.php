<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Webklex\IMAP\Facades\Client;

class viewMailcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        view()->share(['pageTitle' => 'Email']);
        return view('admin_dashboard.mail.mailSettings');
    }

    public function mailData($inboxid)
    {
        view()->share([
            'pageTitle' => 'Email',
            'inboxName' => Client::account(Crypt::decryptString($inboxid))->username,
        ]);
        $message_details = [];
        $client = Client::account(Crypt::decryptString($inboxid));
        $client->connect();

        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders(false);

        /** @var \Webklex\PHPIMAP\Folder $folder */
        foreach ($folders as $folder) {
            // $this->info("Accessing folder: ".$folder->path);
            $messages = $folder->messages()->all()->get();

            // $this->info("Number of messages: ".$messages->count());

            /** @var \Webklex\PHPIMAP\Message $message */
            foreach ($messages as $message) {
                /* echo $folder->path;
                echo $message->getFrom() . '<br />';
                echo $message->getSubject() . '<br />';
                echo $message->getHTMLBody(true);
                echo 'Attachments: ' . $message->getAttachments() . '<br />'; */

                if ($folder->path != 'INBOX.Sent' && $folder->path != 'INBOX.Trash') {
                    $temp['from'] = $message->getFrom();
                    $temp['subject'] = $message->getSubject();
                    $temp['seen'] = $message->getFlags();
                    $temp['timestamp'] = $message->getDate();
                    $temp['body'] = $message->getHTMLBody(true);
                    array_push($message_details, $temp);
                }
                // $this->info("\tMessage: ".$message->message_id);
            }
        }
        return view('admin_dashboard.mail.viewinbox', compact('message_details'));
    }

    public function sendMail(Request $request)
    {
        $cc = $request->cc != '' ? explode(',', $request->cc) : [];
        $bcc = $request->bcc != '' ? explode(',', $request->bcc) : [];
        if ($request->sendMailForm == 'sendSupportMail') {
            return 'hi';
            sendSupportMail($request->to_mail, $request->subject, $request->body, '', null, $cc, $bcc);
        } else {
            sendEnquiryMail($request->to_mail, $request->subject, $request->body, '', null, $cc, $bcc);
        }
        return response()->json([
            'status' => true,
            'message' => 'Message Sent Successfull',
        ]);
    }
}
