<?php

namespace Database\Seeders;

use App\Models\BatchIcon;
use Illuminate\Database\Seeder;

class BatchIconSeeder extends Seeder
{
    public function run()
    {
        BatchIcon::create(['name' => 'Star', 'image' => 'star.png']);
        BatchIcon::create(['name' => 'Heart', 'image' => 'heart.png']);
        BatchIcon::create(['name' => 'Circle', 'image' => 'circle.png']);
        BatchIcon::create(['name' => 'Square', 'image' => 'square.png']);
        BatchIcon::create(['name' => 'Triangle', 'image' => 'triangle.png']);
    }
}
