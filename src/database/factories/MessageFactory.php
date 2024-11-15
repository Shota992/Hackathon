<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'chat_id' => Chat::inRandomOrder()->first()->id, // ランダムなChatを関連付け
            'send_user_id' => User::inRandomOrder()->first()->id, // ランダムな送信者
        ];
    }
}
