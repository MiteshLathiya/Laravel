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
                            Edit User
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
                                <form  method="post" action="{{('/Dashboard/Edituserdata')}}"
                                 enctype="multipart/form-data">
                                 @csrf
                                      
                              
                                <div class="row">
									<div class="col-md-6">
										<label >First Name</label>
										<input class="mb-0 form-control" type="text" name="fn"
											placeholder="Enter your first name" value="{{ $data->firstname }}">
											<input class="form-control" value="{{ $data->id }}" name="id" type="text" style="display: none;">
											@error('fn')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                    <div class="col-md-6">
										<label >Last Name</label>
										<input class="mb-0 form-control" type="text" name="ln"
											placeholder="Enter your last name" value="{{ $data->lastname }}">
											@error('ln')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
									<div class="col-md-6">
										<label for="email">Email</label>
										<input class="mb-0 form-control" value="{{ $data->email }}" type="email" name="em" placeholder="Enter Your Email Address Here..">
											@error('em')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
										<label>Mobile</label>
										<input class="mb-0 form-control" value="{{ $data->mobile }}" type="text" name="mob" placeholder="Enter Your Mobile Number Here..">
										@error('mob')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
                                </div><br>
                                {{-- <div class="row">
                                    <div class="col-md-6">
										<label>Address</label>
										<textarea name="addr" class="mb-0 form-control">
										{{ $data->address }}
                                        </textarea>
										@error('addr')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
								<div class="row">
                                    <div class="col-md-6">
										<label>Post Code</label>
										<input class="mb-0 form-control" value="{{ $data->postcode }}" type="number" name="pcode" placeholder="Enter Your Post Code Here..">
										@error('pcode')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
												
                                        <div class="col-lg-1">						
                                            <label>City</label>
                                        </div>
                                        <div class="col-lg-2">
										<select name="ct" >
											<option value="{{ $data->city }}" >{{ $data->city }}</option>
											<option value="Rajkot">Rajkot</option>
											<option value="Ahmedabad">Ahmedabad</option>
											<option value="Jamnagar">Jamnagar</option>
											<option value="Surat">Surat</option>
											<option value="Vadodara">Vadodara</option>
										</select>	
										@error('ct')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
								<div class="row">
									<div class="col-lg-1">						
										<label>State</label>
                                    </div>
                                    <div class="col-lg-2">
										<select name="st">
											<option value="{{ $data->state }}">{{ $data->state }}</option>
											<option value="Gujarat">Gujarat</option>
										</select>	
										@error('st')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
								<div class="row">
									<div class="col-lg-1">					
										<label >Country</label>
                                    </div>
                                    <div class="col-lg-2">
										<select name="cn">
											<option value="{{ $data->country }}">{{ $data->country }}</option>
											<option value="India">India</option>
										</select>	
										@error('cn')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br> --}}
								<div class="row">
									<div class="col-lg-6 mb--20" class="mb-0 form-control">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" name="pass" placeholder="Enter your password">
										@error('pass')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
								</div><br>
								<div class="row">
									<div class="col-lg-6 mb--20" class="mb-0 form-control">
										<label for="password">Confirm Password</label>
										<input class="mb-0 form-control" type="password" name="cpass" placeholder="Repeat your password">
										@error('cpass')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
								</div><br>
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