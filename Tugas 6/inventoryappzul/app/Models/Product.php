<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

     protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'stock',
        'category_id'
    ];

}
