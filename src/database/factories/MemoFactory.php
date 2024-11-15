<?php

namespace Database\Factories;

use App\Models\Memo;
use App\Models\User;
use App\Models\Posting;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoFactory extends Factory
{
    protected $model = Memo::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id, // ランダムなUserを関連付け
            'posting_id' => Posting::inRandomOrder()->first()->id, // ランダムなPostingを関連付け
        ];
    }
}
