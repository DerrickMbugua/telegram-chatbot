<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BotController extends Controller
{
    public function index()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $response = $telegram->getMe();
        Log::info("Telegram Response: " . $response);
        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        Log::info("Send message");

        $response = $telegram->sendMessage([
            'chat_id' => 1379510697,
            'text' => "Hello world!",
        ]);

        $messageId = $response->getMessageId();
    }
}
