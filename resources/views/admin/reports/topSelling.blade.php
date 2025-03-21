@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6>Top Selling Items </h6>
                </div>
                <!-- <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('reports.orderReport') }}">Back</a>
                </div> -->
            </div>
        </div>

        <div class="card-body table-responsive">
        <div class="loader"></div>
           
    <table class="table table-bordered">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity sold</th>
        </tr>
       
        @foreach ($data as $data)
        <tr>
            <td>{{$data->productId}}</td>
            <td>{{$data->product->productName}}</td>
            <td>{{$data->total_sold}}</td>
        </tr>
        @endforeach
       
    </table>
   
</div>  
</div>
</div>
    
@endsection
