<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $fillable=[

        'user_id','product_id','productname','ISBN_number','qty','price','subtotal'
      ];

    protected $table='carts';
    protected $primaryKey = 'cart_id';

    public function insertdata($data)
    {
        return CartModel::create($data);
    }

    public function showdata($userid, $pid)
    {
        return CartModel::
        where('user_id', '=', $userid)
        ->where('product_id', '=', $pid)->first();
    }

    // public function showrow($id)
    // {
    //     return CartModel::find($id);
    // }

    public function showjoindata($id)
    {
        return CartModel::select()
        ->join('registers', 'registers.id', '=', 'user_id')
        ->join('books', 'books.id', '=', 'product_id')
        ->where('user_id', $id)
        ->get();
    }

    public function showuser($id)
    {
        return CartModel::where('user_id', $id)->get();
    }

    public function showcart($id)
    {
        return CartModel::where('cart_id', $id)->get();
    }

    public function showcartjoin($id)
    {
        return CartModel::select()
        ->join('registers', 'registers.id', '=', 'user_id')
        ->join('books', 'books.id', '=', 'product_id')
        ->where('cart_id', $id)
        ->get();
    }

    // public function countvalue($id)
    // {
    //     return CartModel::where('user_id', '=', $id)
    //     ->count();
    // }

    // public function totalsum($id)
    // {
    //     return CartModel::where('user_id', $id)->sum('subtotal');
    // }

    public function updatecart($data, $id)
    {
        CartModel::where('cart_id', $id)
              ->update($data);
    }

    public function deletedata($id)
    {
      return  CartModel::destroy($id);
    }
}
