<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'address_id',
        'establishment_id',
        'coupon_id',
        'total',
        'comment',
        'pay',
        'status',
        'hash'
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('amount', 'price')
            ->withTimestamps();
    }
}
