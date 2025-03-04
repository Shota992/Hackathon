<?php

namespace Database\Factories;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BatchFactory extends Factory
{
    protected $model = Batch::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(1, 100),
            'batch' => $this->faker->word,
        ];
    }
}
