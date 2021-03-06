@extends('layouts.frontend.master')
@include('layouts.frontend.header')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row  mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
      "slidesToShow": 1,
      "arrows": false,
      "fade": true,
      "draggable": false,
      "swipe": false,
      "asNavFor": ".product-slider-nav"
      }'>
                    <div class="single-slide">
                        <img src="{{ asset('style/frontend/image/products/'.$data->image) }}" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-2.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-3.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-4.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-5.jpg" alt="">
                    </div>
                </div>
                <!-- Product Details Slider Nav -->
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
    "infinite":true,
      "autoplay": true,
      "autoplaySpeed": 8000,
      "slidesToShow": 4,
      "arrows": true,
      "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
      "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
      "asNavFor": ".product-details-slider",
      "focusOnSelect": true
      }'>
                    <div class="single-slide">
                        <img src="{{ asset('style/frontend/image/products/'.$data->image) }}" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-2.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-3.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-4.jpg" alt="">
                    </div>
                    <div class="single-slide">
                        <img src="image/products/product-details-5.jpg" alt="">
                    </div>
                </div>
            </div>
           
            <div class="col-lg-7">
                <form method="post" action="{{ ('/AddToCart') }}">
                    @csrf
                @if (Auth::guard('register')->check())
                <input type="text" value="{{  Auth::guard('register')->user()->id  }}" name="userid" style="display: none;">
                @endif
                <input type="text" value="{{ $data->id }}" name="pid" style="display: none;">
                <div class="product-details-info pl-lg--30 ">
                    <p class="tag-block">Category: <a href="#"><input type="text" value="{{ $data->category }}" name="cat" style="border: none"   readonly> </a>
                    <h3 class="product-title"><input type="text" value="{{ $data->name }}" name="nm" style="border: none" readonly></h3>
                    <ul class="list-unstyled">
                      
                        <li>Author: <a href="#" class="list-value font-weight-bold"> <input type="text" value="{{ $data->author }}" name="author" style="border: none" readonly></a></li>
                        <li>ISBN Code: <span class="list-value"><input type="text" value="{{ $data->ISBN_number }}" name="isbn" style="border: none" readonly> </span></li>
                      @if ($data->quantity == Null)
                      <li>Availability: <span class="list-value"> Out Of Stock</span></li>
                      @else
                      <li>Availability: <span class="list-value"> In Stock :&nbsp; {{ $data->quantity }}</span></li>
                      @endif
                        
                    </ul>
                    <div class="price-block">
                        <span class="price-new"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<input type="text" value="{{ $data->price }}" name="price" style="border: none" readonly></span>
                       
                    </div>
                    <div class="rating-widget">
                        <div class="rating-block">
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star "></span>
                        </div>
                        <div class="review-widget">
                            <a href="#">(1 Reviews)</a> <span>|</span>
                            <a href="#">Write a review</a>
                        </div>
                    </div>
                    
                    <div class="add-to-cart-row">
                        <div class="count-input-block">
                            @if ($data->quantity == Null)
                            @else
                            <span class="widget-label">Qty</span>
                            <input type="number" class="form-control text-center" value="1" min="1" max="5" name="qty" style="border: none">
                            @endif       
                        </div>
                        <div class="add-cart-btn">
                            @if ($data->quantity == Null)
                            <a class="btn btn-outline-primary">Out Of Stock</a>
                            @else
                            <input type="submit" value="+  Add to Cart" class="btn btn-outlined--primary">
                            @endif
                            
                                </a>
                        </div>
                    </div>
                    {{-- <div class="compare-wishlist-row">
                        <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                        <a href="#" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                    </div> --}}
                </div>
            </form>
            </div>
           
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                        aria-controls="tab-1" aria-selected="true">
                        DESCRIPTION
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                        aria-controls="tab-2" aria-selected="true">
                        REVIEWS (1)
                    </a>
                </li>
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <h1 class="sr-only">Tab Article</h1>
                        <p>{{ $data->description }}</p>
                    </article>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                        <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                        <div class="review-comment mb--20">
                            <div class="avatar">
                                <img src="image/icon/author-logo.png" alt="">
                            </div>
                            <div class="text">
                                <div class="rating-block mb--15">
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline"></span>
                                    <span class="ion-android-star-outline"></span>
                                </div>
                                <h6 class="author">ADMIN ??? <span class="font-weight-400">March 23, 2015</span>
                                </h6>
                                <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
                                    quis mi.</p>
                            </div>
                        </div>
                        <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                        <div class="rating-row pt-2">
                            <p class="d-block">Your Rating</p>
                            <span class="rating-widget-block">
                                <input type="radio" name="star" id="star1">
                                <label for="star1"></label>
                                <input type="radio" name="star" id="star2">
                                <label for="star2"></label>
                                <input type="radio" name="star" id="star3">
                                <label for="star3"></label>
                                <input type="radio" name="star" id="star4">
                                <label for="star4"></label>
                                <input type="radio" name="star" id="star5">
                                <label for="star5"></label>
                            </span>
                            <form action="https://demo.hasthemes.com/pustok-preview/pustok/" class="mt--15 site-form ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Comment</label>
                                            <textarea name="message" id="message" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="text" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="submit-btn">
                                            <a href="#" class="btn btn-black">Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <!-- <div class="tab-product-details">
                <div class="brand">
                <img src="image/others/review-tab-product-details.jpg" alt="">
                </div>
                <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
                <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
                <section class="product-features">
                <h3 class="title">Data sheet</h3>
                <dl class="data-sheet">
                <dt class="name">Compositions</dt>
                <dd class="value">Viscose</dd>
                <dt class="name">Styles</dt>
                <dd class="value">Casual</dd>
                <dt class="name">Properties</dt>
                <dd class="value">Maxi Dress</dd>
                </dl>
                </section>
                </div> -->
    </div>
</div>
    <br><br><br><br><br>
    @include('layouts.frontend.footer')