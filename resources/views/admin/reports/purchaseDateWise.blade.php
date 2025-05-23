@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Purchase Report</h1>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6>Purchase Report </h6>
                    </div>
                </div>
            </div> --}}
            <div class="card-body">
                <form method="post" action="{{ route('reports.purchaseDateWiseReport') }}" class="form">
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
