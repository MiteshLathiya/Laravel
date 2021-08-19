@extends('layouts.frontend.master')
@include('layouts.frontend.header')
<style>
 hr.style-eight {
height: 10px;
border: 1;
box-shadow: inset 0 9px 9px -3px rgba(11, 99, 184, 0.8);
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
 }
    </style>
{{-- <script>
    $('.openModal').click(function(){
        var id = $(this).attr('data-id');
        $.ajax({url:"cart.blade.php?id="+id,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
  </script> --}}
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<script>
    window.setTimeout(function() {
        $("div.alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
    </script>

@if(session()->has('delete'))
<div class="alert alert-success" style="font-size: 16px;">
    <center>{{ session()->get('delete') }}<center>
</div>
@endif
@if(session()->has('update'))
<div class="alert alert-success" style="font-size: 16px;">
    <center>{{ session()->get('update') }}<center>
</div>
@endif
@if(session()->has('added'))
<div class="alert alert-success" style="font-size: 16px;">
    <center>{{ session()->get('added') }}<center>
</div>
@endif

<!-- Cart Page Start -->
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Shopping Cart</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="#" class="">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40" style="width:110%;margin-left:-30px;">
                            <table class="table" >
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-edit">Edit</th>
                                        <th class="pro-remove">Delete</th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                               

                                    <form action="{{ ('/OrderCart') }}" method="post">
                                        @csrf
                                       
                                            
                                {{-- @empty($product)     
                                <tr>
                                    <td colspan="7">
                                        <p class="bg-primary text-white p-1" >no product</p>  
                                    </td>
                                </tr>  
                                  
                                    @else   --}}
                                   

                                    @forelse($data as $product)
                                    <input type="text" value=" {{ $product->product_id }}" name="total" style="display: none">
                                    <!-- Product Row -->
                                    {{-- <input type="text" value=" {{ $product->firstname }}" name="total"> --}}
                                   
                                    <tr>
                                        {{-- <a href="#" data-toggle="modal" data-target="#quickModal"
                                        class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                        <td class="pro-edit"><a href="{{ route('editcartview',$product->cart_id) }}"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="pro-remove"><a href="{{ route('deletecart',$product->cart_id) }}"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                       
                                    
                                        <td class="pro-thumbnail"><a href="#"> <img src="{{ asset('style/frontend/image/products/'.$product->image) }}" alt="Product"></a></td>
                                       
                                        <td class="pro-title"><span>{{ $product->productname }}</span></td>
                                        <td class="pro-price"><input type="text"  name="price" value="{{ $product->price }}" readonly style="border:none;margin-left: 100px"></td>
                                       
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" name="qty" class="form-control text-center"
                                                        value="{{ $product->qty }}" readonly>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span> Rs.<label id="subtot">{{ $a=$product->subtotal }}</label></span></td>
                                       
                                        {{-- @php
                                        $r=0;
                                        $r = $r+$product->subtotal
                                     {{ $r }}
                                   @endphp --}}
                                  
                                    </tr>
                                    <input type="number" name="userid" class="form-control text-center"
                                    value="{{ $product->user_id }}" style="display: none">
                                @empty
                                <tr>
                                    <td colspan="7">
                                        <p class="bg-primary text-white p-1" >no product</p>  
                                    </td>
                                </tr>  
                                @endforelse

                                
                                    {{-- @foreach ($data as $product)
                                    
                                      @endforeach --}}
                                     
                                      <!-- Product Row -->
                                      
                                     
                                   
                                    {{-- @endempty   --}}
                                    <!-- Discount Row  -->
                                    {{-- <tr>
                                        <td colspan="6" class="actions">
                                            {{-- <div class="coupon-block">
                                                <div class="coupon-text">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" name="coupon_code" class="input-text"
                                                        id="coupon_code" value="" placeholder="Coupon code">
                                                </div>
                                                <div class="coupon-btn">
                                                    <input type="submit" class="btn btn-outlined"
                                                        name="apply_coupon" value="Apply coupon">
                                                </div>
                                            </div> --}}
                                            {{-- <div class="update-block text-right">
                                                <input type="submit" class="btn btn-outlined" name="update_cart"
                                                    value="Update cart">
                                                <input type="hidden" id="_wpnonce" name="_wpnonce"
                                                    value="05741b501f"><input type="hidden"
                                                    name="_wp_http_referer" value="/petmark/cart/">
                                            </div> --}}
                                        </td>
                                    </tr>
                                {{-- </form> --}}
                                </tbody>
                            </table>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
 
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                    <!-- slide Block 5 / Normal Slider -->
                    {{-- <div class="cart-block-title">
                        <h2>YOU MAY BE INTERESTED IN…</h2>
                    </div>
                    <div class="product-slider sb-slick-slider" data-slick-setting='{
                              "autoplay": true,
                              "autoplaySpeed": 8000,
                              "slidesToShow": 2
                              }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                        {"breakpoint":768, "settings": {"slidesToShow": 3} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Lpple
                                    </span>
                                    <h3><a href="product-details.html">Revolutionize Your BOOK With These
                                            Easy-peasy Tips</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-10.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.html" class="hover-image">
                                                <img src="image/products/product-1.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Jpple
                                    </span>
                                    <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-2.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.html" class="hover-image">
                                                <img src="image/products/product-1.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Wpple
                                    </span>
                                    <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-3.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.html" class="hover-image">
                                                <img src="image/products/product-2.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Epple
                                    </span>
                                    <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-5.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.html" class="hover-image">
                                                <img src="image/products/product-4.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Hpple
                                    </span>
                                    <h3><a href="product-details.html">Simple Things You To Save BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-6.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.html" class="hover-image">
                                                <img src="image/products/product-4.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.html" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.html" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Cart Summary -->
                
                <div class="col-lg-12 col-12 d-flex" style="margin-left: 450px">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            @if ($total==!null)
                                
                           
                            <p>Sub Total <span class="text-primary">RS.{{ $total }}</span></p>
                            <p>Shipping Cost <span class="text-primary">Rs.00</span></p>
                            <input type="text" value="{{ $total }}" name="total" style="display: none">
                            
                           
                            <h2>Grand Total <span class="text-primary">Rs.{{ $total }}</span></h2>
                            @endif
                        </div>
                        <div class="cart-summary-button">
                            {{-- <input type="submit" class="checkout-btn c-btn btn--primary" value="Order Now"> --}}
                            <a href="{{ ('/PlaceOrder') }}" class="checkout-btn c-btn btn--primary">Order Now</a>
                            <a href="{{ ('/') }}"  class="update-btn c-btn btn-outlined">Add More</a>
                            
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.frontend.footer')