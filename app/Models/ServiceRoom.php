<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRoom extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'room_id', 'service_id'
    ];
    protected $table='service_rooms';
}
