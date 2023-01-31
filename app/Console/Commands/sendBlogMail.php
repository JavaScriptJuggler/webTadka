<?php

namespace App\Console\Commands;

use App\Models\blogs;
use App\Models\subscribeModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class sendBlogMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendNewBlogMails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $getBlogs = blogs::latest()->skip(0)->take(3)->get();
        $body = [];
        $body['contents'] = $getBlogs;
        $getSubscribe = subscribeModel::get();
        foreach ($getSubscribe as $key => $value) {
            $body['name'] = $value->name;
        try {
            // Log::debug($body);
            sendEnquiryMail($value->email, 'Latest Blog From Webtadka', $body, $value->name, null, [], [], 'frontend2');
        } catch (\Throwable $th) {
            Log::debug($th);
        }
        }
    }
}
