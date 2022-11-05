<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    public $timestamps=false;
    protected $fillable = [
        'name',
        'content',
        'date',
        'post_id',
        'comment_parent_id',
        'status',
        'user_id',
        'phone'
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }


}
