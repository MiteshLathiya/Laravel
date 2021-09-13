@extends('layouts.frontend.master')
@include('layouts.frontend.header')


		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
							<li class="breadcrumb-item active">Register</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
				
					
						<form action="{{ ('/Register/User') }}" method="POST" >
							@csrf
							<div class="login-form" style="margin-left: 60px;width: 800px;background-color:#E6E6FA">
								<center><h4 class="login-title">New Customer</h4></center>

                              <hr style=" border: 1px solid #62ab00;"><br>
								<div class="row">
									<div class="col-md-6">
										<label >First Name</label>
										<input class="mb-0 form-control" type="text" name="fn"
											placeholder="Enter your first name">
										
												@error('fn')
												<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											
										
									</div>
                                    <div class="col-md-6">
										<label >Last Name</label>
										<input class="mb-0 form-control" type="text" name="ln"
											placeholder="Enter your last name">
											@error('ln')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
									<div class="col-md-6">
										<label for="email">Email</label>
										<input class="mb-0 form-control" type="email" name="em" placeholder="Enter Your Email Address Here..">
											@error('em')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
										<label>Mobile</label>
										<input class="mb-0 form-control" type="number" name="mob" placeholder="Enter Your Mobile Number Here..">
										@error('mob')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
                                </div><br>
                                {{-- <div class="row">
                                    <div class="col-md-6">
										<label>Address</label>
										<textarea name="addr" class="mb-0 form-control">
                                        </textarea>
										@error('addr')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br> --}}
								{{-- <div class="row">
                                    <div class="col-md-6">
										<label>Post Code</label>
										<input class="mb-0 form-control" type="number" name="pcode" placeholder="Enter Your Post Code Here..">
										@error('pcode')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
                                <div class="row">
									<div class="col-lg-6">					
										<label>City</label>
										<select name="ct" >
											<option value="" >--Select City--</option>
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
									<div class="col-lg-6">					
										<label>State</label>
										<select name="st">
											<option value="">--Select State--</option>
											<option value="Gujarat">Gujarat</option>
										</select>	
										@error('st')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div>
                                </div><br>
								<div class="row">
									<div class="col-lg-6">					
										<label >Country</label>
										<select name="cn">
											<option value="">--Select Country--</option>
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
								<div class="row">
								<div class="col-md-4">
								</div>
									<div class="col-md-4">	
										<input type="submit" class="btn btn-outline-success btn-sm" value="Register">
									</div>
									<div class="col-md-4">
									</div>
								</div><br>
							</div>
						</form>
					
					<!-- <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form action="https://demo.hasthemes.com/pustok-preview/pustok/">
							<div class="login-form">
								<h4 class="login-title">Returning Customer</h4>
								<p><span class="font-weight-bold">I am a returning customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Enter your email address here...</label>
										<input class="mb-0 form-control" type="email" id="email1"
											placeholder="Enter you email address here...">
									</div>
									<div class="col-12 mb--20">
										<label for="password">Password</label>
										<input class="mb-0 form-control" type="password" id="login-password" placeholder="Enter your password">
									</div>
									<div class="col-md-12">
										<a href="#" class="btn btn-outlined">Login</a>
									</div>
								</div>
							</div>
						</form>
					</div> -->
				</div>
			</div>
		</main>
	</div>
    @include('layouts.frontend.footer')
	