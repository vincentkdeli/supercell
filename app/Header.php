<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Header extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'user_id',
        'date_time',
        'status'
    ];

    public function detail() {
        return $this->hasMany(Detail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
