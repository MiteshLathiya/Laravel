<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(UserModel $model)
    {
        $this->UserModel = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.user_account');
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
    public function update(Request $request)
    {
        $request->validate(
            [
                'firstname'=>'required|string',
                'lastname'=>'required|string',
                'email'=>'required|email',
                'mobile'=>'required|numeric',
                
            ]
        );

            $id=$request->id;
            $pass=$request->oldpass;
            $newpass=$request->newpass;
          
            $cpass=$request->cpass;
        
        if ($pass and $cpass !== null) {
            $messages = [
           
                'oldpass.required' => 'Please insert Old Password!',
                'newpass.required' => 'Please insert New Password!',
                'cpass.required' => 'Please insert Confirm Password!',
                'cpass.same' => 'New Password and Confrim Password doest not match!',
                   
             ];
        
             $request->validate([
                'oldpass' => 'required',
                'newpass' => 'required',
                'cpass' => 'required|same:newpass'
             ], $messages);
    
             $dataid = $this->UserModel->find($id);

            if (Hash::check($request->oldpass, $dataid->password)) {
                $dataid->fill([
                'password' => Hash::make($request->newpass)
                ])->save();
                
                $data= $this->UserModel->all();
                // $request->session()->flash('success', 'Password changed');
               
                return view('layouts.frontend.user_account')->with('data', $data)->with('successMsg', 'Password changed 
                sucessfully');
            } else {
                $data= $this->UserModel->all();
                //  $request->session()->flash('error', 'Password does not match');
                return view('layouts.frontend.user_account')->with('data', $data)
                ->with('errorMsg', 'Old Password does not match!');
            }

                $data=array(
                    // 'password'=>$request->newpass,
                    'password' => Hash::make($request->cpass)
                    );
                
              
                $dataid->fill($data)->save();
        }

            $dataid = $this->UserModel->find($id);

        $data=array(

            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email' =>$request->email,
            'mobile'=>$request->mobile,
           
            );

        
       
        $dataid->fill($data)->save();

        return redirect()->route('userprofile')->with('update', 'User updated sucessfully!');
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

    public function apiUser($id)
    {
        $data=UserModel::find($id);

    
        if ($data !== null) {
            return response()->json($data, 201);
        } else {
            return response()->json(['error'=>'Failed'], 401);
        }
    }

    public function apiUserUpdate(Request $request, $id)
    {
        $dataid=UserModel::find($id);


        $data=array(

            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'mobile'=>$request->mobile,
           
            );
       
        if ($request->email !== null) {
            $data=array(
            'email'=>$request->email,
            );
        }

       
        if ($data !== null) {
            $dataid->fill($data)->save();

            return response()->json($data, 201);
        } else {
            return response()->json(['error'=>'update Failed'], 401);
        }
    }
}
