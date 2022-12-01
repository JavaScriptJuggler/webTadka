<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $message_details = [];
        $client = Client::account("default");
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
                if ($folder->path != 'INBOX.Sent') {
                    $temp['from'] = $message->getFrom();
                    $temp['subject'] = $message->getSubject();
                    $temp['seen'] = $message->getFlags();
                    $temp['timestamp'] = $message->getDate();
                    array_push($message_details, $temp);
                }
                // $this->info("\tMessage: ".$message->message_id);
            }
        }
        return view('admin_dashboard.viewinbox', compact('message_details'));
    }
}
