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
                <a class="btn btn-primary" href="{{ Route('reports.purchaseDateWisePDF') }}">Download PDF</a>
                    <a class="btn btn-primary" href="{{ Route('reports.purchaseDateWise') }}">Back</a>
                </div>
                <!-- <div class="col" align="right">
                    <a href="{{route('Report.purchasePdf')}}" class="btn btn-primary">Download PDF</a>
                </div> -->
            </div>
        </div>

        @if ($data->isEmpty()) 
        <p style="color: red; font-weight: bold;">No records found for this date.</p>
    @else
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th> 
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->product_id}}</td>
            <td>{{$data->productData->productName}}</td>
            <td>{{ $data->date }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->qty }}</td>
            <td>{{ $data->status }}</td>
                      
        </tr>
        @endforeach
    </table>
    @endif
@endsection