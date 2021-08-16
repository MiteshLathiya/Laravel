<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $fillable=[

        'user_id','product_id','quantity','grandtotal'
      ];

    protected $table='orders';
   
}
