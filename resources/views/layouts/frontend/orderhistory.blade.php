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
   



<section class="order-complete inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
        
                <div class="order-complete-message text-center">
                    <h1>Order History !</h1>
                   
                </div>
             
            
                <h3 class="order-table-title">Order Details</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($date as $date1) --}}
                            @foreach ($data as $data1)
                            <tr>

                                <td>{{ $data1->order_id }}</td>
                                <td>{{ $data1->name }}</td>
                               
                                <td>{{ $data1->order_date }}</td>
                               
                                <td>{{ $data1->status }}</td>
                                <td>{{ $data1->grandtotal }}</td>
                                
                               
                            </tr>
                            {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table><br>
                   
                </div>
            
            </div>
        </div>
    </div>
</section>
</body>
</html>