<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use HasFactory;
    protected $table = 'uploads';
    protected $fillable =
    [
        'user_id','image_name'
    ];
}
