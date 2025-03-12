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
            margin-top: 20px;
    }
    th, td {
            padding: 0.75rem;
            border: 1px solid rgb(30, 35, 40);
            text-align: left;
    }
    </style>
</head>
<body>
    <h3 align="center">Bill</h3>
    
    <table>
        <tr>
            <td><p>Customer : {{$data->user->name}}
            <p>Phone No : {{$data->user->phone}}
            <p>Address :{{$data->shippingAddress->address_line1 }}
                    <p>{{$data->shippingAddress->address_line2 }}
                    <p>{{$data->shippingAddress->pincode }}
            </td>
            <td>Order Date : {{ date('d/m/Y',strtotime($data->orderDate))}} </td>
        </tr>
    </table> 
    
    <table>
        <tr>
            <th>Item name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
        @foreach ($data->orderDetails as $data)
        <tr>
            <td>{{$data->product->productName}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->total}}</td>
        </tr>
        @endforeach
        
    </table>

</body>
</html> 

