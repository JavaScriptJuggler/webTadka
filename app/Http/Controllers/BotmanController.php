<?php

namespace App\Http\Controllers;

use App\Models\chatbot;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showbotmandata', 'index']]);
    }
    public function index()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {
            $chatbot = chatbot::all();
            $flag = 0;
            $botman->typesAndWaits(2);
            foreach ($chatbot as $key => $value) {
                if ($message == strtolower($value->question)) {
                    $botman->reply($value->answer);
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 0) {
                $botman->reply("Sorry, I can't understand this right now, But don't worry, PLEASE GIVE YOUR EMAIL, one of our representative will contact you ASAP... Thank You");
            }
        });
        $botman->listen();
    }

    public function showbotmandata()
    {
        $chatbotdata = chatbot::all();
        view()->share([
            'pageTitle' => 'Chatbot',
            'botData' => $chatbotdata,
        ]);
        return view('admin_dashboard.chatbot');
    }

    public function saveBotData(Request $request)
    {
        chatbot::truncate();
        if (count($request->question) > 0) {
            for ($i = 0; $i < count($request->question); $i++) {
                chatbot::create([
                    'question' => $request->question[$i],
                    'answer' => $request->answer[$i],
                ]);
            }
        }
        return response()->json(['status' => true, 'message' => "Chat's inserted successfully"]);
    }
}
