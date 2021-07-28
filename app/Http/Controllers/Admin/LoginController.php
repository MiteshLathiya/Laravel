<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\LoginModel;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        return view('layouts.admin.login');
    }


    public function adminlogin(Request $request)
    {


        $em= $request->email;
      

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user_data = array(
            'email'  => $request->post('email'),
            'password' => $request->post('password')
           );

           
        //    dd($user_data); exit;

           if(Auth::attempt($user_data))
           {
            $request->session()->put('data',$request->input());
                // $minutes = 60;
               
                
                
                // $response::withCookie(cookie('email', $request->post('email'), $minutes));
                // return $response;
                $minutes = 30;
                $cookie = cookie('name', 'a', $minutes);
              
                // $response = new Response;
                // $response->withCookie(cookie('em', 'hello', $minutes));
            //    $cookie = cookie('em', 'value', $minutes );
                $value = $request->cookie('name');
                // dd($value);
                // return response('Hello World')->cookie($cookie);
                // return $response;
                // $minutes = 30;
                // $response = new Response('Hello World');
                // $response->withCookie(cookie('name', 'virat', $minutes));
                // return $response;
                
            return redirect('/Dashboard');
            // return redirect()->route('/Dashboard');
            //   return redirect('');
            // return view('layouts.admin.content');

           }
           else
           {
               
       
            return redirect()->back()->withErrors(

                [
                    'loginfailed' => 'Please check your email and password!'
                ]
            );
           }


       

    }
   
    public function successlogin()
    {
       
            return view('layouts.admin.content');
       
  
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
}
