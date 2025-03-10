@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6>Bill </h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('reports.orderReport') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive">
        <div class="loader"></div>
            <table class="table table-bordered">
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
    
    <table class="table table-bordered">
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
   
</div>
</div>
</div>
    
@endsection
