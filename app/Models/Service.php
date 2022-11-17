<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'id', 'service','room_id', 'cost'
    ];
    protected $table='services';

    use HasFactory;
    protected $casts = ['services' => 'array'];

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function getName()
    {
        return $this->service;
    }
}
