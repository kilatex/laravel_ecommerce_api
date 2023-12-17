<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'product_id',
    ];

    public function customers(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
