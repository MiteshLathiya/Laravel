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
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td style="color:black;">{{ $row->order_id }}</td>
            <td style="color:black">{{ $row->firstname }}</td>
            <td style="color:black">{{ $row->name }}</td>
            <td style="color:black">{{ $row->ISBN_number }}</td>        
            <td style="color:black">{{ $row->grandtotal }}</td>    
            <td style="color:black">{{ $row->payment }}</td>
            <td style="color:black">{{ $row->order_date }}</td>
            <td style="color:black">{{ $row->status }}</td>
           
        </tr>
        @endforeach
    </tbody>

</table>