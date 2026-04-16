<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
         protected $fillable = [
        'quantity',
        'total_amount',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu:: class);
    }

}
