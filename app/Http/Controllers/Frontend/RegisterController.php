<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\RegisterModel;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
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
                // 'password'=>$request->cn,
                'password' => Hash::make($request->pass)
                );
                
             
                $this->RegisterModel->userinsert($data);

                // return response()->json($data);
                return redirect('/User');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateuser(Request $request)
    {
        // $messages = [
         
        //     'addr.required' => 'Please insert Address!',
        //     'pcode.required' => 'Please insert Post Code!',
        //     'ct.required' => 'Please select City!',
        //     'st.required' => 'Please select State !',
            
        // ];

        // $request->validate(
        //     [
              
        //         'addr'=>'required|string',
        //         'zip'=>'required|string',
        //         'ct'=>'required|string',
        //         'st'=>'required|string',
        //     ],
        //     $messages
        // );

        //     $data=array(
               
        //         'address'=>$request->addr,
        //         'postcode'=>$request->zip,
        //         'city'=>$request->ct,
        //         'state'=>$request->st,
                         
        //         );
                
        //      dd($data);
        //         $this->RegisterModel->create($data);
                return view('layouts.frontend.cart');
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

    // protected function registered(Request $request, $user)
    // {
    //     $user->generateToken();
    
      
    // }

    public function view(Request $request)
    {

        return $this->RegisterModel->all();
            // return response()->json($data);
        // // Here the request is validated. The validator method is located
        // // inside the RegisterController, and makes sure the name, email
        // // password and password_confirmation fields are required.
        // $this->validator($request->all())->validate();
    
        // // A Registered event is created and will trigger any relevant
        // // observers, such as sending a confirmation email or any
        // // code that needs to be run as soon as the user is created.
        // event(new Registered($user = $this->create($request->all())));
    
        // // After the user is created, he's logged in.
        // $this->guard()->login($user);
         // event(new Registered($user = $this->create($request->all())));
    
        
        // $this->guard()->login($user);
    
      
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
        // // And finally this is the hook that we want. If there is no
        // // registered() method or it returns null, redirect him to
        // // some other URL. In our case, we just need to implement
        // // that method to return the correct response.
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

    public function apiRegister(Request $request)
    {

        $request->validate(
            [
                'firstname'=>'required|string',
                'lastname'=>'required|string',
                'email'=>'required|email|unique:registers,email',
                'mobile'=>'required|digits:10',
                'password' => 'required|min:6',
               
            ],
        );

            $data=array(
                
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email' =>$request->email,
                'mobile'=>$request->mobile,
                'password' => Hash::make($request->password)
                );


            $user = $this->RegisterModel->userinsert($data);

            return response()->json($user, 201);
    }
}
