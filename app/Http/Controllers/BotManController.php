<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Conversations\TestConversation;
use Illuminate\Support\Facades\Log;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }


    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startTestConversation(BotMan $bot)
    {

        $bot->reply('Hello! ');
        //Log::error(print_r($bot->getMessage()->getRecipient(),true));

        $bot->on('messaging_reads', function($payload, $bot) {
            $bot->reply('Hello! ');

        });
        //Log::error(print_r($request,true));

        /*
        ob_start();
        echo "<pre>";
        print_r();
        $payload = ob_get_clean();
        $path = public_path().'/'.date('His').'.txt';
        file_put_contents($path,$payload);
        */

    }


}
