<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OrderModel extends Model
{
    use Sortable;

    protected $fillable=[

        'user_id','product_id','address','postcode','city','state','quantity','grandtotal','payment'
        ,'status','order_date'
    ];

      // public $sortable = ['order_id','product.name','registers.firstname','ISBN_numebr','grandtotal','payment','status'
      // ];

      const CREATED_AT = 'order_date';
     
      protected $table='orders';
      protected $primaryKey = 'order_id';
}
