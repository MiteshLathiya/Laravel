<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class IndexModel extends Model
{

    protected $fillable=[

        'image','name','category','author','ISBN_number','pages','language','description','price','quantity'
      ];

    protected $table='books';

    public function showalldata()
    {

        return  IndexModel::take(15)->get();
    }
}
