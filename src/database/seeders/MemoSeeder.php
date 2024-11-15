<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Memo;
use App\Models\User;
use App\Models\Posting;

class MemoSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $postings = Posting::all();

        Memo::factory()->count(5)->create()->each(function ($memo) use ($users, $postings) {
            $memo->user_id = $users->random()->id; // ランダムなUserを関連付け
            $memo->posting_id = $postings->random()->id; // ランダムなPostingを関連付け
            $memo->save();
        });
    }
}
