<?php

namespace App\Http\Controllers\Frontend;

use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\Admin\BookModel;
use App\Models\Frontend\CartModel;
use App\Models\Frontend\OrderModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserMultiSheetExport;

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
        // $result = CartModel::where(['user_id'=> Auth::guard('register')->user()->id])->delete();




      
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
                         
                        return redirect()->route('orderview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }

        $data= $this->OrderModel
        ->select()
     
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          

          ->get();
// dd($data);
        //   $date= $this->OrderModel->where('user_id', $id)->get('created_at');
         
        // $data= $this->OrderModel->where('user_id',"=", $id)->get();
        // $data = $this->OrderModel->find($id);
        // $data = $this->OrderModel->where('user_id', $id);

        // dd($data);
        return view('layouts.frontend.user_account')->with('data', $data);
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
    public function download(Request $request)
    {
        if (Auth::guard('register')->check()) {
            $id=Auth::guard('register')->user()->id;
        }

        $data= $this->OrderModel->select()
        ->select()
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('user_id', $id)
          ->get();

    
      
            view()->share('data', $data);
          $pdf = PDF::loadview('layouts.frontend.orderhistory', $data);
          return $pdf->download('orderhistory.pdf');
        //   return view('layouts.frontend.user_account');
    }

    public function showallorder(Request $request)
    {


    // $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ]);
        $limit= $request->limit;
        $search= $request->search;
        $request->session()->put('limitdata', $limit);
        $request->session()->put('searchdata', $search);
       
        
        if ($limit == null) {
            $limit= 5;
        }
        
        // $books = Book::join('publishers','publishers.id','books.publisher_id')
        //         ->orderBy($sort,$direction)->selectRaw('books.*, publishers.name AS publisher_name')->paginate(5);
        $from=$request->from;
        $to=$request->to;
      

        $data= $this->OrderModel
       
        ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('name', 'LIKE', '%'.$search.'%')
          
                                    ->orWhere('firstname', 'LIKE', '%'.$search.'%')
                                    ->orWhere('ISBN_number', 'LIKE', '%'.$search.'%')
                                    ->orWhere('grandtotal', 'LIKE', '%'.$search.'%')
                                    ->orWhere('payment', 'LIKE', '%'.$search.'%')
                                    ->orWhere('order_date', 'LIKE', '%'.$search.'%')
                                    ->orWhere('status', 'LIKE', '%'.$search.'%')
                                    ->whereBetween('order_date', array($request->from, $request->to))
                                    // ->get()
                                    // ->toArray()
            //                         ->whereDate('order_date', '>=', $from)
            // ->whereDate('order_date', '<=', $to)
            // ->get()
            // ->toArray()
            ->paginate($limit);
           

        //  $startDate = '24/08/2021';
        // $endDate = '25/08/2021';
      
        $from=$request->from;
        $to=$request->to;
        // dd($to);
        if ($from and $to !== null) {
            $date = $this->OrderModel::select('order_date')
            ->whereDate('order_date', '>=', $from)
            ->whereDate('order_date', '<=', $to)
            ->get();
        }
       
  
  

                                    // $from = date('2018-01-01');
                                    // $to = date('2018-05-02');
                                    
                                    // $datedata=OrderModel::whereBetween('order_date', [$from, $to])->get();

                                   

                 $type= $request->downloadtype;


        if ($request->download) {
            $message=
            [
            'downloadtype.required'=>'Please Select Type',
            ];

            $request->validate(
                [
                'downloadtype'=>'required'
                ],
                $message
            );


            if ($type == '.csv') {
                return Excel::download(new UsersExport($search, $limit), 'OrderHistory.csv');
            } elseif ($type == '.xlsx') {
                return Excel::download(new UsersExport($search, $limit), 'OrderHistory.xlsx');
            }
        }
                                
                                   
                // return Excel::download(new UsersExport($user), 'order_history.xlsx');
                                    // $type='csv';

        // Excel::create('Customer Data', function($excel) use ($data){
        //     $excel->setTitle('Customer Data');
        //     $excel->sheet('Customer Data', function($sheet) use ($data){
        //      $sheet->fromArray($data, null, 'A1', false, false);
        //     });
        //    })->download('xlsx');
                                 
      
        
        // $data= $this->OrderModel
        // ->select()
     
        //   ->join('registers', 'registers.id', '=', 'user_id')
        //   ->join('books', 'books.id', '=', 'product_id')
         
          

        //   ->get();
// dd($data);
        return view('layouts.admin.orderhistory')->with('data', $data)
        // ->with('date',$date)
        ;
    }

    public function editorder($id)
    {

        $data= $this->OrderModel->select()
        ->select('orders.*', 'registers.*', 'books.*', 'orders.quantity', 'books.quantity as qty')
          ->join('registers', 'registers.id', '=', 'user_id')
          ->join('books', 'books.id', '=', 'product_id')
          ->where('order_id', $id)
          ->get();
          
        // $qty=$this->OrderModel->find($id);
// $a=$data->order_date;
// dd($data);
        return view('layouts.admin.editorder')->with('data', $data);
    }

    public function updateorder(Request $request)
    {

        $request->validate(
            [
                'return'=>'required'
            ]
        );

        $id=$request->orderid;

        $bookid=$request->productid;
        // dd($bookid);
        $bookdata = BookModel::find($bookid);
        $updateqty=$request->qty+$request->quantity;
        $qty=array(
            'quantity'=>$updateqty,
        );
        $bookdata->fill($qty)->save();

        // $data=array(

        //     ''=>,
        // );
        $data= $this->OrderModel->select()
        ->where('order_id', $id)
        ->update(['status' => $request->return]);
        // dd($data);
        // $dataid = $this->OrderModel->find($id);
        // $id->OrderModel::fill($data)::save();
        // $id->fill($data)->save();
       
       
        return redirect()->route('dashboard.orderhistory')->with('success', 'Updated Successfull');
    }

    public function exceldownload(Excel $excel)
    {
        $user= 1;
        return $excel->download(new UserMultiSheetExport($user), 'order_history.xlsx');
    }
}
