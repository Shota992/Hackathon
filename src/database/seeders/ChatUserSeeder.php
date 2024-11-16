<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatUser;
use App\Models\Chat;
use App\Models\User;

class ChatUserSeeder extends Seeder
{
    public function run()
    {
        $chats = Chat::all();
        $users = User::all();

        foreach ($chats as $chat) {
            ChatUser::create([
                'chat_id' => $chat->id,
                'post_user_id' => $users->random()->id, // ランダムな投稿者
                'listener_user_id' => $users->random()->id, // ランダムなリスナー
            ]);
        }
    }
}
