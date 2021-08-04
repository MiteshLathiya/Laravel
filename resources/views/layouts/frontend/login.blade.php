@extends('layouts.frontend.master')
@include('layouts.frontend.header')


		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
	
		<div class="container">
			<div class="row">
			  <div class="col">
				
			  </div>
			  <div class="col-6">
				<form action="{{ "/UserLogin" }}" method="post">
					@csrf
					<div class="login-form">
						<center><h4 class="login-title">Login</h4></center><br>
						@if ($errors->has('loginfailed'))
						<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><a class="fa fa-times" href="javascript:;" style="color: black;"></a></button>
					 <strong>{{ $errors->first('loginfailed') }}</strong> 
				  </div>
				
				@endif
						<p><span class="font-weight-bold">I am a returning customer</span></p>
						<div class="row">
							<div class="col-md-12 col-12 mb--15">
								<label for="email">Enter your email address here...</label>
								<input class="mb-0 form-control" type="email" id="email1"
									placeholder="Enter you email address here..." name="email">
									@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							<div class="col-12 mb--20">
								<label for="password">Password</label>
								<input class="mb-0 form-control" type="password" id="login-password" name="password" placeholder="Enter your password">
								@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-12" style="margin-left: 130px">
								

									<input type="submit" value="Login" class="btn btn-outlined">
							
								
							</div>
						
						</div>
					</div>
				</form>
			  </div>
			  <div class="col">
				
			  </div>
			</div>
		</div>

		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
				
			

					
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="col-lg-2 col-md-2 col-lg-2s col-xs-2">
				</div>
				<div class="col-lg-8 col-md-8 col-lg-8s col-xs-8">
						
					</div> 
				</div>
				<div class="col-lg-2 col-md-2 col-lg-2s col-xs-2">
				</div>
			</div>
			</form>
			</div>
		</main>
	</div>
    @include('layouts.frontend.footer')
	