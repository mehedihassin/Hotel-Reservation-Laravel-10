<?php

namespace App\Models;
use App\Models\Room;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'user_id',
        'name',
        'phone',
        'email',
        'start_date',
        'end_date',
    ];

    public function room() {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }



    use HasFactory;
}
