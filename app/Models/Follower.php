<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }
}
