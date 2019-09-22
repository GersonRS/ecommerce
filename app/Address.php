<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'state',
        'zipcode',
        'complement'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
