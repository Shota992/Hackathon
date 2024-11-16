<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ColorSeeder::class,
            UserSeeder::class,
            BatchIconSeeder::class,
            BatchSeeder::class,
            PostingSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
            MemoSeeder::class,
            ChatUserSeeder::class,
        ]);
    }
}
