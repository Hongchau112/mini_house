<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = [
        'name',
        'description',
        'room_type_id'
    ];

    public function images()
    {
        $this->belongsToMany(Image::class);
    }

    public function services()
    {
        $this->belongsToMany(Service::class);
    }

}
