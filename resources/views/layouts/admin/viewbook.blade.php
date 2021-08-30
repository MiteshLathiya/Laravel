@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')


<section id="main-content" style="margin-left: 170px">
    <section class="wrapper">
        <div class="form-w3layouts">

                            <!-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
                @endif -->

            @if(session()->has('update'))
            <div class="alert alert-success" style="font-size: 16px;">
                {{ session()->get('update') }}
            </div>
            @endif

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
                </div>


                <br>

                <table  class="table  table-bordered table-hover"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                            <th>@sortablelink('id')</th>
                            <th>Image</th>
                            <th>@sortablelink('name')</th>
                           
                            <th>@sortablelink('ISBN_number')</th>
                            <th>@sortablelink('pages')</th>
                            <th>@sortablelink('language')</th>
                         
                            <th>@sortablelink('price')</th>
                            <th>@sortablelink('quantity')</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td style="color:black;">{{ $row->id }}</td>
                            <td style="color:black;">  <img src="{{ asset('style/frontend/image/products/'.$row->image) }}" alt="" title="" style="width: 100px;height: 100px;"></td>
                            <td style="color:black">{{ $row->name }}</td>
                           
                            <td style="color:black">{{ $row->ISBN_number }}</td>
                            <td style="color:black">{{ $row->pages }}</td>
                            <td style="color:black">{{ $row->language }}</td>
                          
                            <td style="color:black"><span class="fa fa-inr"></span>&nbsp;{{ $row->price }}</td>
                            <td style="color:black">&nbsp;{{ $row->quantity }}</td>
                            <td><a href="{{ route('dashboard.editbook',$row->id) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-sm" style="color: white;" href="{{ route('dashboard.deletebook',$row->id) }}">Delete</a>
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