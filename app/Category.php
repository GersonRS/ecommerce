<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'active'
    ];

    public function products()
    {
        return $this->hasMany(Product::Class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
