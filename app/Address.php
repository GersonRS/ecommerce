<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 * @method static create(array $all)
 */
class Address extends Model
{
    protected $fillable = [
        'address',
        'city',
        'neighborhood',
        'number',
        'complement',
        'active'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
