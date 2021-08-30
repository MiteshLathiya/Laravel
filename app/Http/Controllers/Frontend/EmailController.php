<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\CartModel;
use Illuminate\Http\Request;
use App\Models\Frontend\EmailModel;
use PDF;
// use Barryvdh\DomPDF\Facade\PDF;
use Mail;
use Illuminate\Support\Facades\Auth;

// use App\Models\Frontend\CartModel;
// use App\Models\Frontend\OrderModel;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }
           
          $data= CartModel::select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();

          $total= CartModel::where('user_id', $id)->sum('subtotal');

        return view('layouts.frontend.email')->with('data', $data)->with('total', $total);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendemail(Request $request)
    {

        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }
           
          $product= CartModel::select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();

          view()->share('product', $product);
        
     
          $total= CartModel::where('user_id', $id)->sum('subtotal');
          view()->share('total', $total);
      

// $email=Auth::guard('register')->user()->email;

          $data["email"] = "mitulathiya317@gmail.com";//$email
          $data["title"] = "From miteshlathiya77@gmail.com";
          $data["body"] = "This is Demo";

      
          $pdf = PDF::loadView('layouts.frontend.successorder', ['product'=>$product], ['total'=>$total]);
  
          Mail::send('layouts.frontend.plain', $data, function ($message) use ($data, $pdf) {
              $message->to($data["email"], $data["email"])
                      ->subject($data["title"])
                      ->attachData($pdf->output(), "invoice.pdf");
          });
           $result = CartModel::where(['user_id'=> Auth::guard('register')->user()->id])->delete();
        return view('layouts.frontend.complete');
          dd('Mail sent successfully');
        //
    }
}
