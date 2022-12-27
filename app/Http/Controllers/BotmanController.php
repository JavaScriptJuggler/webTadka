<?php

namespace App\Http\Controllers;

use App\Models\chatbot;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function index()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            $chatbot = chatbot::all();
            $botman->typesAndWaits(2);
            foreach ($chatbot as $key => $value) {
                if ($message == strtolower($value->question)) {
                    $botman->reply($value->answer);
                }
            }
        });
        $botman->listen();
    }
}
