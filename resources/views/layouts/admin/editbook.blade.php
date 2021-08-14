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
                                <form  method="post" action="{{('/Dashboard/Editbook')}}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 
                                 
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                        <img style="width:200;height:150px" src="{{ asset('style/frontend/image/products/'.$data->image) }}"></a>
                                        <input class="form-control" name="img" type="file" >   
                                        @error('img')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $data->name }}" name="nm" type="text">
                                      
                                            <input class="form-control" value="{{ $data->id }}" name="id" type="text" style="display: none;">
                                            @error('nm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $data->category }}" name="cat" type="text" >
                                            @error('cat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Author</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $data->author }}"  name="auth" type="text" >
                                            @error('auth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">ISBN Number</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $data->ISBN_number }}" name="num" type="number">
                                            @error('num')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Price</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $data->price }}" name="pr" type="number">
                                            @error('pr')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                 <br>
                                    <center>  

                                    <input type="submit" value="Edit" class="btn btn-outline-primary" style="width: 100px;">
                                    </center>
                               
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