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
            $newpass=Hash::make($request->newpass);
          
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
    
             $dataid = $this->UserModel->finduser($id);

            if (Hash::check($request->oldpass, $dataid->password)) {
                $passdata= array(
                    'password' => Hash::make($request->newpass)
                    );

                 $this->UserModel->changepassword($passdata, $id);

                $data= $this->UserModel->alldata();
                // $request->session()->flash('success', 'Password changed');
               
                return view('layouts.frontend.user_account')->with('data', $data)->with('successMsg', 'Password changed 
                sucessfully');
            } else {
                $data= $this->UserModel->alldata();
                //  $request->session()->flash('error', 'Password does not match');
                return view('layouts.frontend.user_account')->with('data', $data)
                ->with('errorMsg', 'Old Password does not match!');
            }
        }

            

        $data=array(

            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email' =>$request->email,
            'mobile'=>$request->mobile,
           
            );

        
    //    dd($data);
            $this->UserModel->updateuser($data, $id);

        return redirect('UserProfile')->with('update', 'User updated sucessfully!');
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
        $data= $this->UserModel->finduser($id);

    
        if ($data !== null) {
            return response()->json($data, 201);
        } else {
            return response()->json(['error'=>'Failed'], 401);
        }
    }

    public function apiUserUpdate(Request $request, $id)
    {
        $dataid = $this->UserModel->finduser($id);


        $data=array(

            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'mobile'=>$request->mobile,
           
            );
       
            if ($request->firstname !== null) {
                $data=array(
                'firstname'=>$request->firstname,
                );
            }
            if ($request->lastname !== null) {
                $data=array(
                'lastname'=>$request->lastname,
                );
            }
            if ($request->mobile !== null) {
                $data=array(
                'mobile'=>$request->mobile,
                );
            }
            

        if ($request->email !== null) {
            $data=array(
            'email'=>$request->email,
            );
        }

       
        if ($data !== null) {
            $dataid = $this->UserModel->updateuser($data,$id);

            return response()->json($data, 201);
        } else {
            return response()->json(['error'=>'update Failed'], 401);
        }
    }
}
