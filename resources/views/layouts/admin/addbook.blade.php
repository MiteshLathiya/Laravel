@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')
<!--main content start-->
<section id="main-content" style="width: 90%;">
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Book 
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

     
@if(session()->has('added'))
    <div class="alert alert-success">
        {{ session()->get('added') }}
    </div>
@endif

                        <div class="panel-body">
                            <div class="form">
                                <form  method="post" action="{{('/Dashboard/Addbook')}}"
                                 enctype="multipart/form-data">
                                 @csrf
                                    
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                            <input class="form-control"  name="img" type="file" >
                                            @error('img')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('nm') }}" name="nm" type="text">
                                            @error('nm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('cat') }}"  name="cat" type="text" >
                                            @error('cat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Author</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('auth') }}"  name="auth" type="text" >
                                            @error('auth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">ISBN Number</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('num') }}"  name="num" type="number">
                                            @error('num')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Pages</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('pg') }}" name="pg" type="number"  min="0">
                                            @error('pg')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Language</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="lg">
                                                <option value="">-- Select Language --</option>
                                                <option value="Gujrati">Gujrati</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="English">English</option>
                                            </select>
                                          
                                            @error('lg')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" value="{{ old('desc') }}" name="desc">
                                                
                                            </textarea>
                                           
                                            @error('desc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Price</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ old('pr') }}"  name="pr" type="number">
                                            @error('pr')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                 <br>
                                    <center>  

                                    <input type="submit" value="Add" class="btn btn-outline-primary" style="width: 100px;">
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