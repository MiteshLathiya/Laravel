@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')
<!--main content start-->
<section id="main-content" style="width: auto;margin-left: 170px">
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             Profile
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


                    @if (count($errors))
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
      @endforeach
     @endif  

     <!-- @if ($message = Session::get('success'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

     @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif -->

@if(!empty($successMsg))
  <div class="alert alert-success" style="font-size: 16px;">{{ $successMsg }}</div>
@endif

@if(!empty($errorMsg))
  <div class="alert alert-danger" style="font-size: 16px;"> {{ $errorMsg }}</div>
@endif


                        <div class="panel-body">
                            <div class="form">
                                <form  method="post" action="{{('/Dashboard/ChangePassword')}}"
                                 enctype="multipart/form-data">
                                 @csrf
                                
                            
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Old Password</label>
                                        <div class="col-lg-5">
                                            <input class="form-control" name="oldpass" type="password"  value="{{ old('oldpass') }}">
                                             @foreach($data as $row)
                                            <input class="form-control" value="{{ $row->id }}" name="id" type="text" style="display: none;">
                                            @endforeach
                                            @error('nm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">New Password</label>
                                        <div class="col-lg-5">
                                            <input class="form-control"  name="newpass" type="password" value="{{ old('newpass') }}">
                                            @error('cat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-5">Confirm New Password</label>
                                        <div class="col-lg-5">
                                            <input class="form-control"  name="cpass" type="password" value="{{ old('cpass')}}">
                                            @error('auth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                 <br>
                                    <center>  

                                    <input type="submit" value="Update" class="btn btn-outline-primary" style="width: 100px;">
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