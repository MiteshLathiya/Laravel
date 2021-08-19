<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\CartModel;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(CartModel $model)
    {
        $this->CartModel = $model;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array(
            
        'user_id'=>$request->userid,
        'product_id'=>$request->pid,
        'productname'=>$request->nm,
        'ISBN_number'=>$request->isbn,
        'qty'=>$request->qty,
        'price'=>$request->price,
        'subtotal'=>$request->qty*$request->price,
            );

            $this->CartModel->create($data);
            return redirect()->route('cartview')->with('success', 'Cart Added Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
          
           
        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }

           $count= CartModel::count('user_id');
           $request->session()->put('count', $count);

          $data= $this->CartModel->select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();
      
         $total= CartModel::where('user_id', $id)->sum('subtotal');
        //  dd($total);
           
        //   $data=DB::table('carts')->select()->where('carts.user_id', '=', $id)->get();
        //   DB::table('users')
         
          return view('layouts.frontend.cart')->with('data', $data)->with('total', $total);
    }
    public function showdata(Request $request)
    {
        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }
       
          $data= $this->CartModel->select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();
      
         $total= CartModel::where('user_id', $id)->sum('subtotal');
        //  dd($total);
       
        //   $data=DB::table('carts')->select()->where('carts.user_id', '=', $id)->get();
        //   DB::table('users')
     
          return view('layouts.frontend.orders')->with('data', $data)->with('total', $total);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $data= $this->CartModel->select()
        ->join('registers', 'registers.id', '=', 'user_id')
        ->join('books', 'books.id', '=', 'product_id')
        ->where('cart_id', '=', $id)
        ->get();
        

      

        return view('layouts.frontend.cart_edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
      
       

        $id=$request->cartid;

        $cartid = $this->CartModel->find($id);

        $data=array(
           
        'price'=>$pr=$request->price,
        'qty'=>$qty=$request->qty,
       
        'subtotal'=>$pr*$qty,
        );

        // $dataid=$request->
        $cartid->fill($data)->save();
        

        return redirect()->route('cartview')->with('update', 'Cart update sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CartModel->destroy($id);

        return redirect()->route('cartview')->with('delete', 'Product deleted sucessfully!');
    }
}
