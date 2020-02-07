<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Detail extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'header_id',
        'phone_id',
        'qty'
    ];

    public function header() {
        return $this->belongsTo(Header::class);
    }

    public function phone() {
        return $this->belongsTo(Phone::class);
    }
}
