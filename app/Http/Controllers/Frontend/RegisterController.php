<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\RegisterModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct(RegisterModel $model)
    {
        $this->RegisterModel = $model;
     
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
        return view('layouts.frontend.register');
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

        $messages = [
            'fn.required' => 'Please insert First Name!',
            'ln.required' => 'Please insert Last Name!',
            'em.required' => 'Please insert Email!',
            'em.unique' => 'Email has already been taken.',
            'mob.required' => 'Please insert Mobile!',
            'mob.digits' => 'Enter 10 Digits Mobile Number!',
            // 'addr.required' => 'Please insert Address!',
            // 'pcode.required' => 'Please insert Post Code!',
            // 'ct.required' => 'Please select City!',
            // 'st.required' => 'Please select State !',
            // 'cn.required' => 'Please select Country!',
            'pass.required' => 'Please insert Password!',
            'cpass.required' => 'Please insert Confrim Password!',
            'cpass.same' => 'New Password and Confrim Password doest not match!',
        ];

        $request->validate(
            [
                'fn'=>'required|string',
                'ln'=>'required|string',
                'em'=>'required|email|unique:registers,email',
                'mob'=>'required|digits:10',
                // 'addr'=>'required|string',
                // 'pcode'=>'required|string',
                // 'ct'=>'required|string',
                // 'st'=>'required|string',
                // 'cn'=>'required|string',
                'pass' => 'required|min:6',
                'cpass' => 'required|same:pass'
            ],
            $messages
        );

            $data=array(
             
                
                'firstname'=>$request->fn,
                'lastname'=>$request->ln,
                'email' =>$request->em,
                'mobile'=>$request->mob,
                // 'address'=>$request->addr,
                // 'postcode'=>$request->pcode,
                // 'city'=>$request->ct,
                // 'state'=>$request->st,
                // 'country'=>$request->cn,
                'password'=>$request->cn,
                'password' => Hash::make($request->pass)
                );
                
             
                $this->RegisterModel->create($data);
                return redirect('/User');
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
