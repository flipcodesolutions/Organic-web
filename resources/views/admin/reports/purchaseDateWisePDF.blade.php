<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   

<style>
    table{
        width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background-color: transparent;
            border: 1px solid rgb(30, 35, 40);
    }
    th, td {
            padding: 0.75rem;
            border: 1px solid rgb(30, 35, 40);
            text-align: left;
    }
    </style>
</head>
<body>
    <h3 align="center">Purchase Report</h3>
    <h4 align="center">From {{date('d/m/Y', strtotime($start_date))}} To {{date('d/m/Y', strtotime($end_date))}}</h4>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{$data->productData->productName}}</td>
            <td>{{ $data->date }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->qty }}</td>                    
        </tr>
        @endforeach
    </table>

</body>
</html> 

