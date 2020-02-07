<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'user_id',
        'phone_id',
        'qty',
        'subtotal'
    ];

    protected $table = 'carts';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function phones() {
        return $this->hasMany(Phone::class);
    }
}
