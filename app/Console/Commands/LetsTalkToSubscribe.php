<?php

namespace App\Console\Commands;

use App\Models\LetsTalkModel;
use App\Models\subscribeModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LetsTalkToSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:letsTalktoSubscribe';

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
        $getDataFormLetsTalk = LetsTalkModel::all();
        foreach ($getDataFormLetsTalk as $key => $value) {
            $name = $value->name;
            $email = $value->email;
            $ifDataExist = subscribeModel::where('name', $name)->where('email', $email)->first();
            if (empty($ifDataExist)) {
                subscribeModel::create([
                    'name' => $name,
                    'email' => $email,
                ]);
            }
        }
    }
}
