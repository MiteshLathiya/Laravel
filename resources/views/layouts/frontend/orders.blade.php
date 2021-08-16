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
            <center><h2>Enter Detail First</h2></center><br>
            <form action="" method="post">
                @csrf
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
                      <select id="inputState" class="form-control">
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
                  </div><br>
                  <h4>Payment Method</h4><br>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" value="1" name="payment" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Cash On Delivery</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" value="2" name="payment" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Online Payment</label>
                  </div>
              <br>
                <button type="submit" class="btn btn-primary" style="margin-left: 350px;">Confirm</button>
              </form>
        </div>
    </div>
</div>
@include('layouts.frontend.footer')