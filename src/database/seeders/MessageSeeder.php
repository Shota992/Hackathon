<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Chat;
use App\Models\User;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $chats = Chat::all();

        Message::factory()->count(100)->create()->each(function ($message) use ($chats) {
            $message->chat_id = $chats->random()->id; // ランダムなChatを関連付け
            $message->send_user_id = User::inRandomOrder()->first()->id; // ランダムな送信者
            $message->save();
        });
    }
}
