<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chats';

    protected $fillable = [
        'permit',
        'posting_id',
        'post_user_id',
        'listener_user_id',
    ];

    public function posting()
    {
        return $this->belongsTo(Posting::class);
    }

    public function postUser()
    {
        return $this->belongsTo(User::class, 'post_user_id');
    }

    public function listenerUser()
    {
        return $this->belongsTo(User::class, 'listener_user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
