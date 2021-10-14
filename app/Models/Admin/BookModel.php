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

    public function showqty($product_id)
    {
        return  BookModel::where('id', $product_id)->get(['quantity']);
    }

    public function showbook($product_id)
    {
        return BookModel::where('id', $product_id)->get();
    }

    public function updatedata($data, $product_id)
    {
        BookModel::where('id', $product_id)
        ->update($data);
    }
}
