<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'pass_id',
        'stamp_earned',
        'image',
        'image_path'
    ];
}
