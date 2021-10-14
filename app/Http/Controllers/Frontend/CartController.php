<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\CartModel;
use App\Models\Admin\BookModel;


use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(CartModel $model, BookModel $bookmodel)
    {
        $this->BookModel = $bookmodel;
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
            
        'user_id'=>$userid=$request->userid,
        'product_id'=>$pid=$request->pid,
        'productname'=>$request->nm,
        'ISBN_number'=>$request->isbn,
        'qty'=>$request->qty,
        'price'=>$request->price,
        'subtotal'=>$request->qty*$request->price,
            );


            $user = $this->CartModel->showdata($userid, $pid);
         
          
        if ($user !== null) {
            return redirect()->route('home')->with('message', 'Book already exist in your cart');
        } else {
            $this->CartModel->insertdata($data);
            return redirect()->route('cartview')->with('success', 'Book Added Succesfully!');
        }
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

              

          $data= $this->CartModel->showjoindata($id);

        $count= $this->CartModel->countvalue($id);
    
        // dd($count);
        $request->session()->put('count', $count);

         $total= $this->CartModel->totalsum($id);

         $request->session()->put('subtotal', $total);
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
       
          $data= $this->CartModel->showjoindata($id);
      
         $total= $this->CartModel->totalsum($id);
    
     
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
       
        $data= $this->CartModel->showcart($id)
        ;
        

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
      
        $id=$request->cartid;

        $data=array(
           
        'price'=>$pr=$request->price,
        'qty'=>$qty=$request->qty,
       
        'subtotal'=>$pr*$qty,
        );

        // $dataid=$request->
        $this->CartModel->updatecart($data, $id);
        

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
        // $bookdata= $this->BookModel->showqty($product_id);
        // = BookModel::find($product_id);
        // foreach ($bookdata as $book) {
        //     $bookqty= $book->quantity;
        // }
   
        // $totalqty= $bookqty+$qty;

        // $data=array(
        // 'quantity'=>$totalqty,
        // );
    
        // $modeldata= $this->BookModel->showbook($product_id);
  
    //    $this->BookModel->updatedata($data,$product_id);


        $this->CartModel->deletedata($id);
        return redirect()->route('cartview')->with('delete', 'Product deleted sucessfully!');
    }

    public function apiStore(Request $request)
    {
// dd('hi');


        $product_id=$request->product_id;

        $bookdata= $this->BookModel->showbook($product_id);

        foreach ($bookdata as $book) {
            $nm= $book->name;
            $num= $book->ISBN_number;
            $pr= $book->price;
        }

        $data=array(
            
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'productname'=>$nm,
            'ISBN_number'=>$num,
            'qty'=>$request->qty,
            'price'=>$pr,
            'subtotal'=>$request->qty*$pr,
                );
    
               
              
        if ($data !== null) {
            $this->CartModel->insertdata($data);
            return response()->json([$data,'success'=>'added'], 201);
        } else {
            return response()->json([$data,'error'=>'Failed'], 401);
        }
    }

    public function apiShow(Request $request, $id)
    {
      
        $data= $this->CartModel->showuser($id);
        
        //   $data= $this->CartModel->select()
        //   ->join('registers', 'registers.id', '=', 'user_id')
        //   ->join('books', 'books.id', '=', 'product_id')
        //   ->where('user_id', $id)
        //   ->get();
     
            return response()->json([$data], 201);
    }

    public function apiEdit(Request $request)
    {
        // $id = $request->id;
        $id=$request->cart_id;

        // $cartid = $this->CartModel->find($id);
        $cartid= $this->CartModel->showcart($id);
    

        foreach ($cartid as $cartdata) {
            $pr=$cartdata->price;
        }

    
        $data=array(
           
      
        'qty'=>$qty=$request->qty,
       
        'subtotal'=>$pr*$qty,
        );
// dd($data);
     
        $this->CartModel->updatecart($data, $id);
      
          return response()->json([$data,'Update'=>'Sucess']);
    }

    public function apiDelete($id)
    {
        
        $this->CartModel->deletedata($id);
        return response()->json(['Deleted'=>'Sucessfully!']);
    }
}
