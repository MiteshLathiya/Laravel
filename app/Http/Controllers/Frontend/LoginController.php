<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\LoginModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:register')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.login');
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
    public function userlogin(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user_data = array(
            'email'  => $request->post('em'),
            'password' => $request->post('pass')
           );


        if (Auth::guard('register')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //   $m=Auth::guard('register')->user()->id;
        //     dd($m);
            // $request->session()->put('user', $request->input());
            //  return response()->json($user_data, 201)
            //             ?: redirect('/');
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(
                [
                 'loginfailed' => 'Please check your email and password!'
                ]
            );
        }
     
  

        // return back()->withInput($request->only('email', 'remember'));

        // if (Auth::attempt($user_data)) {
        //     $request->session()->put('data', $request->input());
                
        //     return redirect('/');
        // } else {
        //     return redirect()->back()->withErrors(
        //         [
        //          'loginfailed' => 'Please check your email and password!'
        //         ]
        //     );
        // }
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

    public function logout(Request $request)
    {
        Auth::guard('register')->logout();
        return redirect('/');
    }

    //api
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::guard('register')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
            'message' => 'Invalid login details'
                       ], 401);
        }
            
            $user = LoginModel::where('email', $request['email'])->firstOrFail();
            
            $token = $user->createToken('usertoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    public function apiUser(Request $request)
    {
        return $request->user();
    }
}
