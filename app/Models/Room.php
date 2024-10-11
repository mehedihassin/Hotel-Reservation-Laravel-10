<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'nameroom_title',
        'description',
        'regular_price',
        'discount_price',
        'room_status',
        'room_type',
        'wifi',
        'food',
        'image',
        'images',
    ];

    use HasFactory;
}
