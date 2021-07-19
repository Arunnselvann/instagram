<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followers extends Model
{

    protected $table = 'followers';
    protected $fillable =
    [
        'user_id','follower_id','satus'
    ];
}
