<?php

namespace Database\Seeders;

use App\Models\Posting;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostingSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            Posting::factory()->count(5)->create(['user_id' => $user->id]);
        });
    }
}
