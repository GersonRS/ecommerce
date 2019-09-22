<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'nameLable',
        'lat',
        'lng',
        'website',
        'mail',
        'address',
        'phone',
        'image',
        'thumbnail',
        'active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->hasMany(Order::Class);
    }
    public function coupon()
    {
        return $this->hasMany(Coupon::Class);
    }
}
