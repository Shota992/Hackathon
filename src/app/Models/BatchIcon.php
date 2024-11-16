<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatchIcon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'batch_icons';

    protected $fillable = [
        'name',
        'image',
    ];

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
