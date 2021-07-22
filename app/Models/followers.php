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
    public function user()
    {
        return $this->belongsTo(register::class, 'follower_id', 'id');
    }
    public function follower()
    {
        return $this->belongsTo(register::class,'user_id','id');
    }
}
