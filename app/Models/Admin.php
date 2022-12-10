<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;
//    public $timestamps = true;
    use Authenticatable;
    protected $fillable = [
      'name', 'phone', 'email', 'password', 'address', 'birthday', 'sex', 'account', 'avatar'
    ];
    protected $table='users';

    public function roles(){
        return $this->belongsToMany(Roles::class);

    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return false;
    }


    public function login(){
        return $this->belongsTo('App\Models\Login','user');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

}
