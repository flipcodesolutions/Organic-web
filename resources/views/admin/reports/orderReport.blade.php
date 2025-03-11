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
            <td>{{$data['id']}}
            <td>{{$data['orderDate']}}
            <td>{{$data['user']['name']}}
            <td><a class="btn btn-primary" href="{{ route('reports.bill',$data['id'])}}"><i class="fa-solid fa-eye"></i></a>
        </tr>
        @endforeach
        
    </table>
</div>
</div>
</div>
    
@endsection
