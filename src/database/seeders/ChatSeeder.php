<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;
use App\Models\Posting;
use App\Models\User;
use App\Models\ChatUser;

class ChatSeeder extends Seeder
{
    public function run()
    {
        $postings = Posting::all();
        $users = User::all();

        Chat::factory()->count(5)->create()->each(function ($chat) use ($postings, $users) {
            // ランダムな投稿を関連付け
            $chat->posting_id = $postings->random()->id;
            $chat->save();

            // ChatUserエントリを作成
            ChatUser::create([
                'chat_id' => $chat->id,
                'post_user_id' => $users->random()->id, // ランダムな投稿者
                'listener_user_id' => $users->random()->id, // ランダムなリスナー
            ]);
        });
    }
}
