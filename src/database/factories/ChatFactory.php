<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{
    protected $model = Chat::class;

    public function definition()
    {
        return [
            'permit' => $this->faker->boolean,
            'posting_id' => Posting::inRandomOrder()->first()->id, // ランダムな投稿
        ];
    }
}
