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
            <div class="alert alert-success" style="font-size: 16px;font-weight: 900">
                {{ session()->get('update') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" style="font-size: 16px;font-weight: 900">
                {{ session()->get('delete') }}
            </div>
            @endif
            <form method="get" action="{{ '/Dashboard/Viewuser'}}">
              
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            Show <select name="limit">
                                <option value="{{session()->get('limitdata')}}">{{session()->get('limitdata')}}</option>
                                
                                    {{-- <option value="{{session()->get('limitdata')}}" @if({{session()->get('limitdata')}}) selected @endif>{{session()->get('limitdata')}}</option> --}}
                               
                                <option value="5">5</option>
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

                <table class="table table-striped"  style="width:100%;font-size: 15px;">

                    <thead>
                        <tr>
                            <th>@sortablelink('id')</th>
                            <th>@sortablelink('firstname')</th>
                           
                            <th>@sortablelink('lastname')</th>
                            
                           
                           
                            <th>@sortablelink('email')</th>
                            <th>@sortablelink('mobile')</th>
                          
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td style="color:black;">{{ $row->id }}</td>
                            <td style="color:black">{{ $row->firstname }}</td>
                         
                            <td style="color:black;">{{ $row->lastname }}</td>
                          
                            <td style="color:black">{{ $row->email }}</td>
                            <td style="color:black">{{ $row->mobile }}</td>
                           
                            <td><a href="{{ route('dashboard.edituser',$row->id) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-sm" style="color: white;" href="{{ route('dashboard.deleteuser',$row->id) }}">Delete</a>
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