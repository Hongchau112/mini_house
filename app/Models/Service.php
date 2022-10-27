<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'id', 'maylanh', 'bep', 'gac', 'room_id'
    ];
    protected $table='services';

    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
