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
        <?php
            $qty_count=0;
            $item_count=0;
        ?>
        @foreach ($data->orderDetails as $product)
        <tr>
            <td>{{$product->product->productName}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->qty}}</td>
            <td>{{$product->total}}</td>
            <?php
                $item_count++;
                $qty_count=$qty_count+$product->qty;
            ?>
        </tr>
        <tr>
            <td>Total Items {{$item_count}}</td>
            <td></td>
            <td>Total Quantity{{$qty_count}}</td>
            <td></td>
        </tr>
        @endforeach
        <tr>
            <td colspan=3>Total order Amount</td>
            <td>{{$data->total_order_amt}}</td>
        </tr><tr>
            <td colspan=3>Discount</td>
            <td>{{$data->dis_amt_point}}</td>
        </tr>
        <tr>
            <td colspan=3>Total Bill Amount</td>
            <td>{{$data->total_bill_amt}}</td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <a class="btn btn-primary" href="{{ Route('reports.billPDF') }}">Download PDF</a>
            </td>
        </tr>
    </table>
   
</div>  
</div>
</div>
    
@endsection
