<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
      protected $fillable = [
        'rice_name',
        'price',
        'stock_quantity',
        'description'
        
    ];

    public function category()
    {
        return $this->belongsTo(Category:: class);
    }
}
