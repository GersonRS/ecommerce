<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'address',
        'number',
        'phone',
        'image',
        'thumbnail',
        'active',
        'minimum_value',
        'delivery_fee'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::Class);
    }
    public function coupons()
    {
        return $this->hasMany(Coupon::Class);
    }
    public function opening()
    {
        return $this->hasMany(Opening::Class);
    }
    public function categories()
    {
        return $this->hasMany(Category::Class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
