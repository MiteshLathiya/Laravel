<?php

namespace app\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;



class BookModel extends Model
{
    use Sortable;
    
    // public function factory()
    // {
    //     factory(App\Models\Admin\BookModel::class)->create();
    // }
    protected $fillable=[

      'image','name','category','author','ISBN_number','pages','language','description','price'
    ];

    public $sortable = ['id', 'name', 'category', 'author', 'ISBN_number','pages','language','description','price'];
    protected $table='books';

    // public function category()
    // {
    //     return $this->belongsTo('App\Category', 'id');
    // }
}
