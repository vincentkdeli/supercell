<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profilepicture',
        'gender',
        'dateofbirth',
        'address',
        'role'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function cart() {
        return $this->hasOne(Cart::class);
    }

    public function header() {
        return $this->hasMany(Header::class);
    }
}
