@extends('layouts.frontend.master')
@include('layouts.frontend.header')

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
           
           
              
            <center><h2>Enter Detail First</h2></center>
        <form action="{{ "/OrderInsert" }}" method="post">
                @csrf
                <div id="divCheckbox" style="display: none;">
                    @foreach ($data as $product)
                    <input type="text" value=" {{ $product->product_id }}" name="productid" style="display: none;"><br>
                    <input type="number" name="qty" class="form-control text-center"
                                      value="{{ $product->qty }}" >
                    <input type="text" value="{{ $product->user_id }}" name="userid" style="display: none;">
                  @endforeach
                </div>
              
                <input type="text" value="{{ $total }}" name="total" style="display: none;">
                <div class="form-group" style="width: 50%;">
                    <label for="exampleFormControlTextarea1" >Enter Full Address</label>
                    <textarea class="form-control" name="addr" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
               
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">City</label>
                      <input type="text" name="ct" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">State</label>
                      <select id="inputState" name="st" class="form-control">
                        <option selected>Choose...</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Maharastra">Maharastra</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>

                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Zip</label>
                      <input type="text" name="zip" class="form-control" id="inputZip">
                    </div>
                    
                    {{-- <div class="form-group" style="width: 50%;">
                        <input class="form-check-input" type="radio" name="payment" value="1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          COD
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" value="2" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Online Payment
                        </label>
                      </div> --}}
                  </div><br>
            <div class="form-group" style="width: 50%;">
                    <label for="exampleFormControlTextarea1" ><h4>Payment Method</h4></label>
                    
                
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Cash On Delivery " checked>
                    <label class="form-check-label" for="exampleRadios1">
                      COD
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Online Payment">
                    <label class="form-check-label" for="exampleRadios2">
                      Online Payment
                    </label>
                  </div><br>
                </div>
                  
              <br>
                <input type="submit" value="Submit" class="btn btn-primary" style="margin-left: 350px;">
            </form>
        </div>
    </div>
</div>
@include('layouts.frontend.footer')