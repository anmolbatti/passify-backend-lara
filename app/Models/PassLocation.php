<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id',
        'user_id',
        'pass_id',
    ];

    public function location(){
        return $this->hasOne(Location::class, 'id','location_id');
    }
}
