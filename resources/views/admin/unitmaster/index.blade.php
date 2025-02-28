@extends('layouts.app')
@section('content')
    @if (Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
    @endif
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">UnitMaster Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-danger" href="{{Route('unitmaster.deactive')}}">Deactive-Data</a>
                        <a class="btn btn-primary" href="{{Route('unitmaster.create')}}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($unitmasters as $unitmasters)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $unitmasters->unit }}</td>
                            <td>
                                <a href="{{Route('unitmaster.edit',$unitmasters->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{Route('unitmaster.delete',$unitmasters->id)}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

     {{-- sweet alert deactive file includ --}}
     @include('admin.sweetalert.deactive')
@endsection
