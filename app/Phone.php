<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Phone extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'brand',
        'image',
        'description',
        'price',
        'discount',
        'stock',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function detail() {
        return $this->hasMany(Detail::class);
    }
}
