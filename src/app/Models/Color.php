<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'color';

    protected $fillable = [
        'color_name',
        'color_code',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
