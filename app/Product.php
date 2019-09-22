<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'establishment_id',
        'category_id',
        'description',
        'price',
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

}
