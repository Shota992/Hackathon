<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;
use App\Models\Posting;
use App\Models\User;

class ChatSeeder extends Seeder
{
    public function run()
    {
        $postings = Posting::all();

        Chat::factory()->count(5)->create()->each(function ($chat) use ($postings) {
            $chat->posting_id = $postings->random()->id; // ランダムな投稿を関連付け
            $chat->post_user_id = User::inRandomOrder()->first()->id;
            $chat->listener_user_id = User::inRandomOrder()->first()->id;
            $chat->save();
        });
    }
}
