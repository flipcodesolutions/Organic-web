@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6>Order Report </h6>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive">

        <form method="get" action="{{ route('reports.orderReport') }}" class="filter-form">
                
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Start Date : <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}">
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
</form>
        <div class="loader"></div>
            <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Customer</th>
            <th>Action</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{$data->id}}
            <td>{{$data->orderDate}}
            <td>{{$data->user->name}}
            <td><a class="btn btn-primary" href="{{ route('reports.bill',$data->id)}}"><i class="fa-solid fa-eye"></i></a>
        </tr>
        @endforeach
        
    </table>
</div>
</div>
</div>
    
@endsection
