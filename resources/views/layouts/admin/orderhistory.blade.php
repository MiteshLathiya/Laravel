@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')

<script>
$('#to').datepicker({
    dateFormat: 'yy-mm-dd'
});
</script>
<section id="main-content" style="margin-left: 170px">
    <section class="wrapper">
        <div class="form-w3layouts">

           
          

            @if(session()->has('delete'))
            <div class="alert alert-success" style="font-size: 16px;">
                {{ session()->get('delete') }}
            </div>
            @endif

            <form method="get" action="{{ '/Dashboard/Orderhistory'}}">
      
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            {{-- <form action="{{ '/Dashboard/DownlaodHistory' }}" method='post'> --}}
                            Show <select name="limit">
                                @if (session()->get('limitdata'))
                                <option value="{{session()->get('limitdata')}}">{{session()->get('limitdata')}}</option>
                                @else
                                <option value="5">5</option>
                                @endif
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select> entries
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-5">
                            Search: <input type="text" name="search" value="{{session()->get('searchdata')}}">
                        </div>
                    </div>
                  <br>
                    <div class="row">
                    <div class="col-10">
                    </div>
                    <div class="col-2">
                        <input type="submit">
                    </div>
                    </div>
                    {{-- <div class="form-group-attached">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-group-default required" >
                                    <label>From</label>
                                    <input type="date" data-date-format='yyyy-mm-dd' class="form-control" name="from" placeholder="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-group-default required" >
                                    <label>To</label>
                                    <input type="date" data-date-format='yyyy-mm-dd' class="form-control" name="to">
                                </div>
                            </div>
                        </div>
                      </div> --}}
                    <div class="row">
                        <div class="col-5">
                          <select name="downloadtype">
                            <option value="">Select Type</option>
                              <option value=".csv">CSV</option>
                              <option value=".xlsx">XLSX</option>
                          </select>
                        
                            <input type="submit" name="download" value="Download">
                            <br>
                            @error('downloadtype')
                            <div class="alert alert-danger" style="width: 50%;padding: 2px;">{{ $message }}</div>
                            @enderror
                        </form>
                        </div>
                    </div>
                </div>


                <br>

                <table  class="table  table-bordered table-hover"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                            <th>Order_id</th>
                            <th>Firstname</th>
                            <th>Book Name</th>
                            <th>ISBN_number</th>
                            
                           
                           
                            <th>Grandtotal</th>
                         
                            <th>Payment</th>
                               <th>Order Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                        {{-- @forelse($date as $date1)
                        <tr>
                            <td style="color:black">{{ $date1->order_date }}</td>
                        </tr>
                    @empty
                        <p>No replies</p>
                    @endforelse    --}}
                
                        @foreach($data as $row)
                        <tr>
                            <td style="color:black;">{{ $row->order_id }}</td>
                            {{-- <td style="color:black;">  <img src="{{ asset('style/frontend/image/products/'.$row->image) }}" alt="" title="" style="width: 100px;height: 100px;"></td> --}}
                            <td style="color:black">{{ $row->firstname }}</td>
                            <td style="color:black">{{ $row->name }}</td>
                            <td style="color:black">{{ $row->ISBN_number }}</td>
                           
                           
                         
                            <td style="color:black">{{ $row->grandtotal }}</td>
                          
                            <td style="color:black">{{ $row->payment }}</td>
                            <td style="color:black">{{ $row->order_date }}</td>
                            <td style="color:black">{{ $row->status }}</td>
                           
                            <td><a href="{{ route('dashboard.editorder',$row->order_id) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{  $data->appends(Request::all())->links() }}
            </form>
        </div>

    </section>

</section>
@include('layouts.admin.footer')