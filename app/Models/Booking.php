<?php

namespace App\Models;
use App\Models\Room;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'phone',
        'email',
        'start_date',
        'end_date',
    ];

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }


    use HasFactory;
}
