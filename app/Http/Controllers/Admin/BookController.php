<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct(BookModel $model)
    {
        $this->BookModel = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.addbook');
    }
 
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'img.required' => 'Please insert image!',
            'img.image' => 'Insert only image!',
            'img.max' => 'Insert less then 3mb!',
            'nm.required' => 'Please insert Book Name!',
            'cat.required' => 'Please insert Category!',
            'auth.required' => 'Please insert Author!',
            'num.required' => 'Please insert ISBN Number!',
            'pg.required' => 'Please insert Total Page!',
            'lg.required' => 'Please insert Language!',
            'desc.required' => 'Please insert Description !',
            'pr.required' => 'Please insert Price!',
            'qty.required' => 'Please insert Quantity!',
        ];

        $request->validate([
            'img'=>'required|image|max:3000',//kilobytes
          
            'nm'=>'required|string|max:255',
            'cat'=>'required|string|max:255',
            'auth' =>'required',
            'num'=>'required|string|max:255',
            'pg'=>'required',
            'lg'=>'required',
            'desc'=>'required',
            'pr'=>'required|string|max:255',
            'qty'=>'required|string|max:255',
        ], $messages);

    

        $img=$request->file('img');
        $filename=rand(). '.'.$img->getClientOriginalExtension();
        $img->move('style/frontend/image/products', $filename);

        $data=array(
             
            'image'=>$filename,
            'name'=>$request->nm,
            'category'=>$request->cat,
            'author' =>$request->auth,
            'ISBN_number'=>$request->num,
            'pages'=>$request->pg,
            'language'=>$request->lg,
            'description'=>$request->desc,
            'price'=>$request->pr,
            'quantity'=>$request->qty,

            );
            
         
            $this->BookModel->create($data);
            return redirect()->back()->with('added', 'Book added sucessfully!');
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
        
        $data= $this->BookModel->where('name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('category', 'LIKE', '%'.$search.'%')
                                    ->orWhere('author', 'LIKE', '%'.$search.'%')
                                    ->orWhere('ISBN_number', 'LIKE', '%'.$search.'%')
                                    ->orWhere('price', 'LIKE', '%'.$search.'%')
                                    ->sortable()
                                    ->paginate($limit);

  
        return view('layouts.admin.viewbook', ['data'=>$data]);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = $this->BookModel->find($id);


         return view('layouts.admin.editbook', ['data'=>$data]);
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
        $img=$request->file('img');

        if ($img !== null) {
            $messages = [
                'img.required' => 'Please insert image!',
            'img.image' => 'Insert only image!',
            'img.max' => 'Insert less then 3mb!',
            ];
            $request->validate([
                'img'=>'required|image|max:3000',
            ], $messages);
        }
        $messages = [
            // 'img.required' => 'Please insert image!',
            'nm.required' => 'Please insert Book Name!',
            'cat.required' => 'Please insert Category!',
            'auth.required' => 'Please insert Author!',
            'num.required' => 'Please insert ISBN Number!',
            'pr.required' => 'Please insert Price!',
            'qty.required' => 'Please insert Quantity!',
        ];

        $request->validate([
            // 'img'=>'required|image',
            'nm'=>'required|string|max:255',
            'cat'=>'required|string|max:255',
            'auth' =>'required',
            'num'=>'required|string|max:255',
            'pr'=>'required|string|max:255',
            'qty'=>'required|string|max:255',
        ], $messages);

        
        $id = $request->id;
      
        $dataid = $this->BookModel->find($id);


      
        $img=$request->file('img');
        if ($img !== null) {
            $filename=rand(). '.'.$img->getClientOriginalExtension();
            $img->move('style/frontend/image/products', $filename);
            $data=array(
                'image'=>$filename
            );
            $dataid->fill($data)->save();
        }
       

        $data=array(
       
            'name'=>$request->nm,
            'category'=>$request->cat,
            'author' =>$request->auth,
            'ISBN_number'=>$request->num,
            'price'=>$request->pr,
            'quantity'=>$request->qty,
        );

        // dd($data);
        

        // $data = $request->all();
       
        $dataid->fill($data)->save();
     
      

         
        return redirect()->route('dashboard.viewbook')->with('update', 'Book updated sucessfully!');
            // return redirect('/Dashboard/Viewbook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->BookModel->destroy($id);

        return redirect()->route('dashboard.viewbook')->with('delete', 'Book deleted sucessfully!');
    }
    public function showproduct($id)
    {
        $data = $this->BookModel->find($id);
      
        return view('layouts.frontend.product-details')->with('data', $data);
    }
}
