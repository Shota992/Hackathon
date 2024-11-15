<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'role',
      'generation',
      'target',
      'icon_image',
      'color_id',
  ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'generation' => 'float',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function postings()
    {
        return $this->hasMany(Posting::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'post_user_id');
    }

    public function listenerChats()
    {
        return $this->hasMany(Chat::class, 'listener_user_id');
    }

    public function memos()
    {
        return $this->hasMany(Memo::class);
    }
}
