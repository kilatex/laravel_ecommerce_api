<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function delivery(){
        return $this->hasOne('App\Models\Delivery');
    }
}
