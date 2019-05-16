<?php
use App\Http\Controllers\BotManController;
use App\Page;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Facebook\FacebookDriver;
use Illuminate\Http\Request;
DriverManager::loadDriver(FacebookDriver::class);


$request = Request::capture();

if($request->isMethod('post')){
    Log::error(print_r($request->all(),true));
}

if($request->has('entry.0.id')) {

    $fbid = $request->input('entry.0.id');
    $page = Page::where('fbid', $fbid)->firstOrFail();
    $config = $page->getConfig();
    $botman = BotManFactory::create($config);

    $botman->hears('hi', BotManController::class . '@startTestConversation');
}

if (! $request->isMethod('get')) {
    $botman->listen();
}