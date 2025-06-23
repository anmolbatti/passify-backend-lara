<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppleErrorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'errors',
        'version'
    ];

    protected $guarded = [];
}
