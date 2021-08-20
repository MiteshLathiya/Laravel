@extends('layouts.frontend.master')
@include('layouts.frontend.header')

		
	
		
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
							<li class="breadcrumb-item active">Order Complete</li>
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
						{{-- <ul class="order-details-list">
							
							@foreach ($data as $data1)
							<li>Total: <strong>Rs.{{ $data1->grandtotal }}</strong></li>
							<li>Payment Method: <strong>{{ $data1->payment }}</strong></li>
							@endforeach
						</ul> --}}
					
						<h3 class="order-table-title">Order Details</h3>
						<div class="table-responsive">
							<table class="table order-details-table">
								
									
							
								<thead style="background-color: #62ab00">
									<tr >
										<th style="color: white;font-size: 16px">Product</th>
										<th style="color: white;font-size: 16px">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($data as $data1)
									<tr>
										<td><a href="single-product.html">{{ $data1->productname }}</a> <strong>×{{ $data1->qty }}</strong></td>
										<td><span>Rs.{{ $data1->subtotal }}</span></td>
									</tr>
									
									@endforeach
								</tbody>
								<tfoot style="background-color: whitesmoke">
									<tr>
										<th>Total:</th>
										<td><span>Rs.{{ $total }}/-</span></td>
									</tr>
									
									
								</tfoot>
							
							</table><br>
							<a href="{{ ('/Email') }}" class="btn  btn-info" style="margin-left: 380px">Confirm</a>
						</div>
					
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
		@include('layouts.frontend.footer')

	