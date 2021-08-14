@extends('layouts.frontend.master')
@include('layouts.frontend.header')
<style>
 hr.style-eight {
     margin-left: -450px;
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
                    <li class="breadcrumb-item active">Cart Edit</li>
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

<!-- Cart Page Start -->
<main class="cart-page-main-block inner-page-sec-padding-bottom" style="margin-left: 450px;">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Update Cart</h1>
                <hr class="style-eight" />
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details-info pl-lg--30 ">
                        @foreach ($data as $product)
                        <form method="post" action="{{ ('/UpdateCart') }}" style="margin-left: -150px;border: none" class="form-control">
                                @csrf
                     
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product Name :-</label>
                                <div class="col-sm-10">
                                  <input type="text" value="{{ $product->productname }}" class="form-control"   style="width: 50%;border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Author :-</label>
                                <div class="col-sm-10">
                                  <input  type="text" value="{{ $product->author }}" class="form-control"  style="border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ISBN Number :-</label>
                                <div class="col-sm-10">
                                  <input  type="text" value="{{ $product->ISBN_number }}" class="form-control"  style="border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Pages :-</label>
                                <div class="col-sm-10">
                                  <input   type="text" value="{{ $product->pages }}" class="form-control "   style="border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Language :-</label>
                                <div class="col-sm-10">
                                  <input  type="text" value="{{ $product->language }}" class="form-control"  style="border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                   
                            <input type="text" value="{{ $product->cart_id }}" name="cartid"  style="display: none; background-color: white;" readonly>
                           
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Price :-</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $product->price }}" name="price" class="form-control "  style="border: none;font-weight: 900;background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Quantity :-</label>
                                <div class="col-sm-10">
                                  <input type="number" value="{{ $product->qty }}" name="qty" class="form-control " min="1" max="5" style="width: 10%;font-weight: 900;background-color: white;">
                                </div>
                            </div>
                            <div>
                                <input class="btn btn-outlined btn-primary btn-sm" type="submit" value="Update" style="margin-left: 450px">
                            </div>
                            
                            
                          </form>
                       @endforeach
                       
                        
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
                {{-- <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
                    aria-labelledby="quickModal" aria-hidden="true" style="width: 60%;margin-left: 250px;margin-top: 30px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button><br>
                       
                            <div class="product-details-modal">
                                <center> <h2>Update Cart</h2> </center>
                                <hr class="style-eight" />
                                <div class="row">
                                    {{-- <h2>Update Cart</h2> --}}
                                    {{-- <div class="col-lg-7 mt--30 mt-lg--30">
                                       
                                        <div class="product-details-info pl-lg--30 ">
                                           
                                            Product Name :-<h2 class="product-title"> {{ $data->productname }}</h2>
                                            <ul class="list-unstyled">
                                              
                                                <li>Author: <span class="list-value"> {{ $data->author }}</span></li>
                                                <li>ISBN Code: <span class="list-value"> {{ $product->ISBN_number }}</span></li>
                                                <li>Pages: <span class="list-value"> {{ $product->pages }}</span></li>
                                                <li>Language: <span class="list-value"> {{ $product->language }}</span></li>
                                               
                                            </ul>
                                                <form method="post" action="{{ ('/UpdateCart') }}">
                    
                                            <div class="price-block">
                                                <input type="text" value="{{ $product->cart_id }}" name="cartid" style="display: none" readonly>
                                                <input type="text" value="{{ $product->price }}" name="price" style="border: none" readonly>
                                                    
                                            </div>
                                            
                                            
                                            <div class="add-to-cart-row">
                                                <div class="count-input-block">
                                                    <span class="widget-label">Qty</span>
                                                    <input type="number" class="form-control text-center" name="qty" value="{{ $product->qty }}" min="1" max="5">
                                                </div>
                                                <div class="add-cart-btn">
                                                    <input class="btn btn-outlined--primary" type="submit" value="Update">
                                                  
                                                </div>
                                            </div>
                                                                </form>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> --}}
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
                
                {{-- <div class="col-lg-12 col-12 d-flex" style="margin-left: 450px">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            <p>Sub Total <span class="text-primary">$1250.00</span></p>
                            <p>Shipping Cost <span class="text-primary">$00.00</span></p>
                            <h2>Grand Total <span class="text-primary">$1250.00</span></h2>
                        </div>
                        <div class="cart-summary-button">
                            <a href="checkout.html" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <a href="{{ ('/') }}"  class="update-btn c-btn btn-outlined">Add More</a>
                            
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</main>
@include('layouts.frontend.footer')