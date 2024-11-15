<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::create(['color_name' => 'Red', 'color_code' => 'red-600']);
        Color::create(['color_name' => 'Green', 'color_code' => 'emerald-600']);
        Color::create(['color_name' => 'Blue', 'color_code' => 'cyan-600']);
        Color::create(['color_name' => 'Yellow', 'color_code' => 'yellow-300']);
        Color::create(['color_name' => 'Gray', 'color_code' => 'gray-400']);
    }
}
