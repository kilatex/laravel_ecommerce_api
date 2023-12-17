<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'stock',
        'description',
        'img',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function order(){
        return $this->hasMany('App\Models\Order');
    }

    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }
    
}
