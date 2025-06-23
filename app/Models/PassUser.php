<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // Correct namespace

class PassUser extends Model
{
    use Notifiable;
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'serialNumber',
        'auth_token',
        'name',
        'phone',
        'email',
        'pass_id',
        'stamps_earned',
        'reward_available',
        'stamps_required_for_reward',
        'user_id',
        'deviceLibraryIdentifier',
        'passTypeIdentifier',
        'pushToken',
        'update_sent',
        'message_sent',
        'classSuffix',
        'objectSuffix',
        'deviceType'
    ];

    public function pass()
    {
        return $this->belongsTo(Pass::class);
    }

    public function routeNotificationForApn()
    {
        return $this->pushToken;
        // return $this->device_token;
    }
}
