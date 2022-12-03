<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable = [
        'title',
        'content',
        'post_type_id',
        'image',
    ];


    public function room(){
        return $this->belongsTo('App\Models\Post', 'room_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }
}
