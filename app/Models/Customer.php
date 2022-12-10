<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'birthday', 'sex', 'avatar', 'identified_no','booking_id','booking_people_id'
    ];
}
