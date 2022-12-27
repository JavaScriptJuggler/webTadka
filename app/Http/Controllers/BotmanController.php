<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function index()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            $botman->typesAndWaits(2);
            if ($message == 'hi') {
                $this->askName($botman);
            } else {
                $botman->reply("I can't understand your words 🥺...Please say again");
            }
        });
        $botman->listen();
    }
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you ' . $name);
        });
    }
}
