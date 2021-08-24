<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class OrderModel extends Model
{
    use Sortable;

    protected $fillable=[

        'user_id','product_id','address','postcode','city','state','quantity','grandtotal','payment'
    ];

      public $sortable = ['user_id','product_id','address','postcode','city','state','quantity','grandtotal','payment'
      ];

      protected $table='orders';
      protected $primaryKey = 'order_id';
}
