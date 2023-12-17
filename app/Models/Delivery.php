<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'date'
    ];
    
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id');
    }
}
