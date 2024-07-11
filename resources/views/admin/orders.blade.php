<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #cccc;
            margin: 0;
            padding: 20px;
        }

        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #cccc00;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid black;
            font-size: 15px;
        }

        .styled-table th {
            background-color: #f2f2f2;
           color: #4CAF50;
            text-transform: uppercase;
            font-size: 12px;
            font-size: 15px;
        }


        
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f9f9f9;
        }

       
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #4CAF50;
            /* Green border at the last row */
        }

        .styled-table tbody td {
            color: grey;
            font-size: 20px;
            border-bottom: 1px solid #dddddd;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            <table class="styled-table">
                <thead>
                    <tr>
                        <th class="customer">Customer name</th>
                        <th class="customer">Customer Address</th>
                        <th class="customer">Customer Phone</th>
                        <th class="customer">Product title</th>
                        <th class="customer"> Product price </th>
                        <th class="customer">Product image</th>
                        <th class="customer">Product status</th>
                        <th class="customer">on the way</th>
                        <th class="customer">Delivered</th>
                        <th class="customer">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->rec_address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>
                            <img width="200px" src="/images/{{$order->product->image}}" alt="">
                        </td>

                        <td>{{$order->status}}</td>
                        <td><a href="{{url('on_the_way',$order->id)}}" class="btn btn-danger">On the way</a></td>
                        <td><a href="{{url('delivered',$order->id)}}" class="btn btn-success">Delivered</a></td>
                        <td><a href="{{url('print_pdf',$order->id)}}" class="btn btn-success">print pdf</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('admin.footer')
</body>

</html>