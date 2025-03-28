@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6>Purchase Report </h6>
                </div>
                <div class="col" align="right">
                    <a href="{{route('Report.purchasePdf')}}" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
        </div>


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
        @foreach($purchase as $data)
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
    </table> -->
    <div class="container">
<div class="card shadow-sm  bg-body rounded">
<div class="card-header">
   <div class="row d-flex align-items-center">
      <div class="col text-white">
         <h6>Purchase Report </h6>
      </div>
   </div>
</div>
<div class="card-body">
   <form method="post" action="{{route('reports.purchaseDateWiseReport')}}">
   @csrf
   <div class="row mb-3">
      <div class="col-sm-12 col-lg-3 col-md-12">
         Start Date : <span class="text-danger">*</span>
      </div>
      <div class="col">
         <div class="form-floating">
            <input type="date" class="form-control" name="start_date" id="start_date">
            @error('start_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-12 col-lg-3 col-md-12">
        End Date : <span class="text-danger">*</span>
      </div>
      <div class="col">
         <div class="form-floating">
            <input type="date" class="form-control" name="end_date" id="end_date">
            @error('end_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
      </div>
    </div>
      <div class="row mb-3">
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">
           Generate Report</button>
         </div>
      </div>

</div>

@endsection
