<?php

namespace Database\Factories;

use App\Models\Posting;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostingFactory extends Factory
{
    protected $model = Posting::class;

    public function definition()
    {
        return [
            'anonymity' => $this->faker->boolean,
            'content' => $this->faker->text(200),
        ];
    }
}
