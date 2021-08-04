<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\UserModel;
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
        return view('layouts.admin.viewuser');
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
    public function show(Request $request)
    {
        $limit= $request->limit;
        $search= $request->search;
        $request->session()->put('limitdata', $limit);
        $request->session()->put('searchdata', $search);
       
        
        if ($limit == null) {
            $limit= 5;
        }
        
        $data= $this->UserModel->where('firstname', 'LIKE', '%'.$search.'%')
                               
                                ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                               
                                ->orWhere('email', 'LIKE', '%'.$search.'%')
                                ->orWhere('mobile', 'LIKE', '%'.$search.'%')
                                ->sortable()
                                ->paginate($limit);
     
        return view('layouts.admin.viewuser', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->UserModel->find($id);
       
        return view('layouts.admin.edituser')->with('data', $data);
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
        $messages = [
            'fn.required' => 'Please insert First Name!',
            'ln.required' => 'Please insert Last Name!',
            'em.required' => 'Please insert Email!',
            'mob.required' => 'Please insert Mobile!',
            'mob.digits' => 'Enter 10 Digits Mobile Number!',
            // 'addr.required' => 'Please insert Address!',
            // 'pcode.required' => 'Please insert Post Code!',
            // 'ct.required' => 'Please select City!',
            // 'st.required' => 'Please select State !',
            // 'cn.required' => 'Please select Country!',
            // 'pass.required' => 'Please insert Password!',
            // 'cpass.required' => 'Please insert Confrim Password!',
            // 'cpass.same' => 'New Password and Confrim Password doest not match!',
        ];

        $request->validate(
            [
                'fn'=>'required|string',
                'ln'=>'required|string',
                'em'=>'required|email',
                'mob'=>'required|digits:10',
                // 'addr'=>'required|string',
                // 'pcode'=>'required|string',
                // 'ct'=>'required|string',
                // 'st'=>'required|string',
                // 'cn'=>'required|string',
                // 'pass' => 'required|min:6',
                // 'cpass' => 'required|same:pass'
            ],
            $messages
        );

            $id = $request->id;
            $pass = $request->pass;
            $cpass = $request->cpass;

        if ($pass and $cpass !== null) {
            $messages = [
                'pass.required' => 'Please insert Password!',
                'cpass.required' => 'Please insert Confrim Password!',
                'cpass.same' => 'New Password and Confrim Password doest not match!',
            ];

            $request->validate(
                [
                    'pass' => 'required|min:6',
                    'cpass' => 'required|same:pass'
                ],
                $messages
            );

                $data=array(
                    'password'=>$request->cn,
                    'password' => Hash::make($request->pass)
                    );
            
                // $data = $request->all();
                $dataid = $this->UserModel->find($id);
                $dataid->fill($data)->save();
        }
      
        $dataid = $this->UserModel->find($id);

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
           
            );

        // $data = $request->all();
       
        $dataid->fill($data)->save();

        return redirect()->route('dashboard.viewuser')->with('update', 'User updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdata= $this->UserModel->destroy($id);

        return redirect()->route('dashboard.viewuser')->with('delete', 'User deleted sucessfully!');
    }
}
