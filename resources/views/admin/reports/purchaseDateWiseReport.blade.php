@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6>Purchase Report </h6>
                </div>
                <div class="col" align="right">
                    <a class="btn btn-primary" href="{{ Route('reports.purchaseReport') }}">Back</a>
                </div>
            </div>
        </div>

    <div class="card-body">    
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        @if(count($data)>0)
        @foreach($data as $data)
        <tr>
            <td>{{ $data->id }}</td>
           
            <td>{{$data->productData->productName}}</td>
            <td>{{ $data->date }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->qty }}</td>
            
                      
        </tr>
        @endforeach
        <tr>
            <td colspan="5" align="center">
                <a class="btn btn-primary" href="{{ Route('reports.purchaseDateWisePDF') }}">Download PDF</a>
            </td>
        @else
            <tr>
                <td colspan="5" align="center" style="color: red;">
                     <h5>No Purchase Record Found</h5>
                </td>
            </tr>
         @endif
    </table>
</div>
</div>
    
@endsection