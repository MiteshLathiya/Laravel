<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $fillable=[

        'user_id','product_id','address','postcode','city','state','quantity','grandtotal','payment'
      ];

    protected $table='orders';
    protected $primaryKey = 'order_id';
}
