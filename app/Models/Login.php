<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable =[
        'email',
        'password',
        'name',
        'phone',
        'social_id',
        'avatar'
    ];
    protected $primaryKey = 'id';
    protected $table='admins';
}
