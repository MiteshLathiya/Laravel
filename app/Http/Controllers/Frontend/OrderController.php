<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderModel;
use App\Models\Frontend\CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(OrderModel $model)
    {
        $this->OrderModel = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.frontend.orders');
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

        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }
           
          $data= CartModel::select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();

        foreach ($data as $data1) {
            $order = new OrderModel();
            $order->user_id = $data1['user_id'];
            $order->product_id = $data1['product_id'];
            $order->address = $request->input('addr');
            $order->postcode = $request->input('zip');
            $order->city = $request->input('ct');
            $order->state = $request->input('st');
            $order->quantity = $data1['qty'];
            // dd($a);
            $order->grandtotal = $request->input('total');

          
            $order->payment = $request->input('payment');
            $order->save();

            // $input['enroll_no'] = $cart;
            // $input['student_name '] = $student_name[$key];
            // $input['present'] = $present[$key];
          
            // Model::create($input);
            // $input['enroll_no'] = $no;
            // $input['user_id'] = $request->userid[$key];
            // $input['product_id']= $request->productid[$key];
            // $input['address']= $request->addr[$key];
            // $input['postcode']= $request->zip[$key];
            // $input['city']= $request->ct[$key];
            // $input['state']= $request->st[$key];
            // $input['quantity']= $request->qty[$key];
            // $input['grandtotal']= $request->addr[$key];
            // $input['payment']= $request->payment[$key];
        }
        $result = CartModel::where(['user_id'=> Auth::guard('register')->user()->id])->delete();




      
        // $this->OrderModel->create($multidata);
            // $messages = [
                    

            //             'addr.required' => 'Please insert Address!',
            //             'zip.required' => 'Please insert Post Code!',
            //             'ct.required' => 'Please select City!',
            //             'st.required' => 'Please select State !',
            //             'payment.required' => 'Please select State !',
                        
            //         ];

            //         $request->validate(
            //             [
                        
            //                 'addr'=>'required|string',
            //                 'zip'=>'required|string',
            //                 'ct'=>'required|string',
            //                 'st'=>'required|string',
            //                 'payment'=>'required',
            //             ],
            //             $messages
            //         );

            //             $data=array(
            //                 'user_id'=>$request->userid,
            //                 'product_id'=>$request->productid,
            //                 'address'=>$request->addr,
            //                 'postcode'=>$request->zip,
            //                 'city'=>$request->ct,
            //                 'state'=>$request->st,
            //                 'quantity'=>$request->addr,
            //                 'grandtotal'=>$request->addr,
            //                 'payment'=>$request->payment,
            //                 );
                            
                        // dd($data);
                         
                            return redirect('/EmailView');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
