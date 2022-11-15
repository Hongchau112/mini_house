<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name', 'user_phone', 'user_email', 'user_sex', 'user_birthday', 'user_address', 'room_id', 'payment_method'
    ];
    protected $table='booking';

}
