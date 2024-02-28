<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\User;
use App\Notifications\TelegramNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramNotificationController extends Controller
{
    private $telegram;
    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function sendMessage($id)
    {
        $sensor = Sensor::orderBy('id', 'DESC')->first();
        $response = $this->telegram->sendMessage([
            'chat_id' => $id,
            'text' => "Ketinggian Air Saat Ini: " . $sensor->distance . " cm dan berstatus " . $sensor->status
        ]);

        return $response->getMessageId();
    }

    public function message()
    {
        $response = $this->telegram->getUpdates();
        return $response;

        // return $this->telegram->getMe();
    }
}
