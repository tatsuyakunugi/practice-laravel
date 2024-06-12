<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reservation_day',
        'number_of_people',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    protected $appens = [
        'reservation_date',
        'reservation_time',
    ];

    public function getReservationDateAttribute()
    {
        $reservation_day = Carbon::parse($this->reservation_day);
        $reservation_date = $reservation_day->format('Y-m-d');

        return $reservation_date;
    }

    public function getReservationTimeAttribute()
    {
        $reservation_day = Carbon::parse($this->reservation_day);
        $reservation_time = $reservation_day->format('H:i');

        return $reservation_time;
    }
}
