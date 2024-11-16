<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Color;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $colors = Color::all();

        User::factory()->count(5)->create()->each(function ($user) use ($colors) {
            $user->color_id = $colors->random()->id;
            $user->save();
        });
    }
}
