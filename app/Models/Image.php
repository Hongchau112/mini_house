<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'room_image';
    protected $fillable =['id', 'image_path', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }


}
