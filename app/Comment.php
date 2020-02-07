<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'comment',
        'phone_id',
        'user_id',
        'date_time'
    ];

    public function phone() {
        return $this->belongsTo(Phone::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
