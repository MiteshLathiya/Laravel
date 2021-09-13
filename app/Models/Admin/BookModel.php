<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BookModel extends Model
{
    use Sortable;
    
 
    protected $fillable=[

      'image','name','category','author','ISBN_number','pages','language','description','price'
      ,'quantity'];

   
    protected $table='books';

    public $sortable = ['id', 'name', 'category', 'author', 'ISBN_number','pages','language','description','price'
    ,'quantity'];
}
