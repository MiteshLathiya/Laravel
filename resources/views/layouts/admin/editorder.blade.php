@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')
<!--main content start-->
<section id="main-content" style="margin-left: 170px">
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Book
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>

                    </section>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">




                        <div class="panel-body">
                            <div class="form">
                                <form  method="post" action="{{('/Dashboard/UpdateOrder')}}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 
                                 
                                 @foreach ($data as $data1)    
                                 <input class="form-control" name="orderid"  value="{{ $data1->order_id }}"  type="text" style="display: none;">
 
                                        <input class="form-control" name="qty"  value="{{ $data1->qty }}"  type="text" style="display: none;">
                                     
                                           
                                      
                               
                                    <div class="form-group ">
                                    <label for="lastname" class="control-label col-lg-3">User ID</label>
                                    <div class="col-lg-6">

                                        <input class="form-control" value="{{ $data1->user_id }}"  type="text" readonly>
                                      
                                    </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Book ID</label>
                                        <div class="col-lg-6">

                                            <input class="form-control" name="productid" value="{{ $data1->product_id }}"  type="text" readonly>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Book ISBN</label>
                                        <div class="col-lg-6">

                                            <input class="form-control" value="{{ $data1->ISBN_number }}"  type="text" readonly>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Book Quantity</label>
                                        <div class="col-lg-6">
    
                                            <input class="form-control" name="quantity"  value="{{ $data1->quantity }}"  type="text" readonly>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Book Issue Date</label>
                                        <div class="col-lg-6">
    
                                            <input class="form-control" value="{{ $data1->order_date }}"  type="text" readonly>
                                           
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Book Return Date</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="return" type="date">
                                            @error('return')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @endforeach
                                 <br>
                                   <input type="submit" value="Edit">
                               
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>

</section>

<!--main content end-->
</section>
@include('layouts.admin.footer')
</body>

</html>