<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;

class testController extends Controller
{
    public function index()
    {
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
                echo $folder->path;
                echo $message->getSubject() . '<br />';
                echo $message->getHTMLBody(true);
                echo 'Attachments: ' . $message->getAttachments() . '<br />';
                // $this->info("\tMessage: ".$message->message_id);
            }
        }

        return 0;
    }
}
