<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>

{{-- <h3>{{ $title }}</h3> --}}
<style>
   
  .table{
    max-width: 2480px;
    width:100%;
  }
  .table td{
    width: auto;
    padding: 10px;
    overflow: hidden;
    word-wrap: break-word;
  }
</style>
    </style>



<section class="order-complete inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
        
                <div class="order-complete-message text-center">
                    <h1>Thank you !</h1>
                    <p>Your order has been received</p>
                  
                </div>
             
            
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
        
                            @foreach ($product as $products)
                            <tr>
                                <td>{{ $products->productname  }}<strong>×{{ $products->qty }}</strong></td>
                                <td><span>Rs.{{ $products->subtotal  }}</span></td>
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
                   
                </div>
            
            </div>
        </div>
    </div>
</section>
</body>
</html>