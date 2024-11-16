<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatUser extends Model
{
    use HasFactory;

    protected $table = 'chat_users';

    protected $fillable = [
        'chat_id',
        'post_user_id',
        'listener_user_id',
    ];

    /**
     * リレーション: チャット
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    /**
     * リレーション: 投稿者
     */
    public function postUser()
    {
        return $this->belongsTo(User::class, 'post_user_id');
    }

    /**
     * リレーション: リスナー
     */
    public function listenerUser()
    {
        return $this->belongsTo(User::class, 'listener_user_id');
    }

    /**
     * カスタムアクセサ: Authユーザーが投稿者かを識別
     */
    public function getIsPostUserAttribute()
    {
        return $this->post_user_id === Auth::id();
    }

    /**
     * カスタムアクセサ: Authユーザーがリスナーかを識別
     */
    public function getIsListenerUserAttribute()
    {
        return $this->listener_user_id === Auth::id();
    }
}
