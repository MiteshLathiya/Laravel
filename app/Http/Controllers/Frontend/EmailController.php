<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\EmailModel;
use Mail;
use Illuminate\Support\Facades\Auth;
// use App\Models\Frontend\CartModel;
use App\Models\Frontend\OrderModel;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.email');
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
    public function show($id)
    {
        //
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

    public function sendmail(Request $request)
    {

        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }
           
          $data= OrderModel::select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();

          
       

        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
          ]);
  
        //   $data = [
        //     'subject' => $request->subject,
        //     'email' => $request->email,
        //     'content' => $request->content
        //   ];
  
        //   Mail::send('email-template', $data, function ($message) use ($data) {
        //     $message->to($data['email'])
        //     ->subject($data['subject']);
        //   });
  
          return view('layouts.frontend.email')->with('data' , $data);
    }
}

