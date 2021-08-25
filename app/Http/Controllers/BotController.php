<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Keyboard\Keyboard;

class BotController extends Controller
{
    public function index()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $response = $telegram->getMe();
        Log::info("Telegram Response: " . $response);
        $telegram->commandsHandler(true);
        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        Log::info("Send message");
//send message
        $response = Telegram::sendMessage([
            'chat_id' => 1379510697,
            'text' => "Hello Derro",
        ]);
        //set webhook
        // $response = $telegram->setWebhook([
        //     'url' => 'https://063c-105-163-2-167.ngrok.io/api/index'
        // ]);
        //remove webhook
        //  $response = $telegram->removeWebhook();

        // $keyboard = [
        //     ['1', '2', '3'],
        //     ['4', '5', '6'],
        //     ['7', '8', '9'],
        //          ['0']
        // ];

        // $reply_markup = Keyboard::make([
        //     'keyboard' => $keyboard,
        //     'resize_keyboard' => true,
        //     'one_time_keyboard' => true
        // ]);


        // $response = Telegram::sendMessage([
        //     'chat_id' => 1379510697,
        //     'text' => 'Hello World',
        //     'reply_markup' => $reply_markup
        // ]);

        // $messageId = $response->getMessageId();

    }
}
