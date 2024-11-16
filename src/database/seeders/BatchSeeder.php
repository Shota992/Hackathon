<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\BatchIcon;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    public function run()
    {
        $icons = BatchIcon::all();

        Batch::factory()->count(5)->create()->each(function ($batch) use ($icons) {
            $batch->batch_icon_id = $icons->random()->id;
            $batch->save();
        });
    }
}
