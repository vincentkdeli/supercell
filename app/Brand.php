<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name'
    ];

    public function phones() {
        return $this->hasMany(Phone::class);
    }
}
