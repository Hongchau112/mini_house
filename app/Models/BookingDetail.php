<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_method',
        'booking_id',
        'room_id',
        'total_cost',
        'date',
        'booking_status',
    ];
    protected $table='booking_details';
}
