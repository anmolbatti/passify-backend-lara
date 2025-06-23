<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassReward extends Model
{
    use HasFactory;

    protected $fillable = [
        'pass_id',
        'reward_name',
        'reward_description',
        'stamp_success_message',
        'reward_success_message',
        'stamp_no',
    ];
}
