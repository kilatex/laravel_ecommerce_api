<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address'
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function order(){
        return $this->hasMany('App\Models\Order');
    }
    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }
}
