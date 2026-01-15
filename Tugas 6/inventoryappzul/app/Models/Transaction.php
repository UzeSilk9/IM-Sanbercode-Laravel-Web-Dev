<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";

     protected $fillable = [
        'product_id',
        'user_id',
        'created_at',
        'updated_at',
        'type',
        'amount',
       
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
