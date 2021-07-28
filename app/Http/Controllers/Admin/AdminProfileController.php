<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(AdminProfileModel $model) {
        $this->AdminProfileModel = $model;
    }

    public function index()
    {
        return view('layouts.admin.adminprofile');
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
        $data= $this->AdminProfileModel->all();
       
        
        return view('layouts.admin.adminprofile',['data'=>$data]);
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
        $id = $request->id;
       

         $messages = [
           
            'oldpass.required' => 'Please insert Old Password!',
            'newpass.required' => 'Please insert New Password!',
            'cpass.required' => 'Please insert Confirm Password!',
            'cpass.same' => 'New Password and Confrim Password doest not match!',
           
        ];

        $request->validate([
            // 'img'=>'required|image',
            'oldpass' => 'required',
            'newpass' => 'required',
            'cpass' => 'required|same:newpass'
        ],$messages);
      
       
        // return view('layouts.admin.adminprofile',['data'=>$data]);
        $user = AdminProfileModel::find($id);

        /*
        * Validate all input fields
        */
        // $this->validate($request, [
        //     'password' => 'required',
        //     'new_password' => 'confirmed|max:8|different:password',
        // ]);
        
        if (Hash::check($request->oldpass, $user->password)) { 
           $user->fill([
            'password' => Hash::make($request->newpass)
            ])->save();
            
            $data= $this->AdminProfileModel->all();
            // $request->session()->flash('success', 'Password changed');
           
           return view('layouts.admin.adminprofile')->with('data', $data)->with('successMsg','Password changed suucessfully');
        
        } else {
            $data= $this->AdminProfileModel->all();
            //  $request->session()->flash('error', 'Password does not match');
            return view('layouts.admin.adminprofile')->with('data', $data)->with('errorMsg','Old Password does not match!');
        }
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
