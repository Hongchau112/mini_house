<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone', 'email', 'sex', 'birthday', 'address', 'room_id'
    ];
    protected $table='booking';

}
