<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $fillable=[

        'user_id','product_id','productname','ISBN_number','qty','price','subtotal'
      ];

    protected $table='carts';
}
