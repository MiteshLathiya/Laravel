@extends('layouts.frontend.master')
@include('layouts.frontend.header')

		
	
		
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
							<li class="breadcrumb-item active">Complete</li>
						</ol>
					</nav>
                   
				</div>
			</div>
		</section>

		<!-- order complete Page Start -->
		<section class="order-complete inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
				
						<div class="order-complete-message text-center">
							<h1>Thank you !</h1>
							<p>Your order has been received,<br> Check your mail for pdf invoice</p>
						</div>
							
						</div>
					
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
		@include('layouts.frontend.footer')

	