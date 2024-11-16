<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chats';

    protected $fillable = [
        'permit',
        'posting_id',
    ];

    public function posting()
    {
        return $this->belongsTo(Posting::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chatUsers()
    {
        return $this->hasMany(ChatUser::class, 'chat_id');
    }
}
