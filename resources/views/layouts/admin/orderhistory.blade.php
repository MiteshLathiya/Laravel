@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')


<section id="main-content" style="margin-left: 170px">
    <section class="wrapper">
        <div class="form-w3layouts">

           
          

            @if(session()->has('delete'))
            <div class="alert alert-success" style="font-size: 16px;">
                {{ session()->get('delete') }}
            </div>
            @endif

            <form method="get" action="{{ '/Dashboard/Viewbook'}}">
      
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            Show <select name="limit">
                                <option value="{{session()->get('limitdata')}}">{{session()->get('limitdata')}}</option>
                                <option value="">5</option>
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
                </div>


                <br>

                <table  class="table  table-bordered table-hover"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                            <th>@sortablelink('id')</th>
                            <th>Image</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('firstname')</th>
                            <th>@sortablelink('ISBN_number')</th>
                           
                            <th>@sortablelink('grandtotal')</th>
                         
                            <th>@sortablelink('payment')</th>
                            <th>@sortablelink('status')</th>
                            {{-- <th>Action</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td style="color:black;">{{ $row->order_id }}</td>
                            <td style="color:black;">  <img src="{{ asset('style/frontend/image/products/'.$row->image) }}" alt="" title="" style="width: 100px;height: 100px;"></td>
                            <td style="color:black">{{ $row->name }}</td>
                            <td style="color:black">{{ $row->firstname }}</td>
                            <td style="color:black">{{ $row->ISBN_number }}</td>
                         
                            <td style="color:black">{{ $row->grandtotal }}</td>
                          
                            <td style="color:black">{{ $row->payment }}</td>
                            <td style="color:black">{{ $row->status }}</td>
                            <td><a href="{{ route('dashboard.editorder',$row->order_id) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{-- {{  $data->appends(Request::all())->links() }} --}}
            </form>
        </div>

    </section>

</section>
@include('layouts.admin.footer')