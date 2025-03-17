@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Create New Unit</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('unitmaster.index') }}">Back</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 180px">Create New Unit</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('unitmaster.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="deliveryslotform" method="post" action="{{Route('unitmaster.store')}}" class="form">
                    @csrf
                    {{-- unitmaster --}}

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Unit<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="unit" id="floatingInput" value="{{ old('unit') }}"
                                            class="form-control" placeholder="Enter Unit">
                                            <label for="floatingInput">Enter unit</label>
                                        <span id="nameError" class="text-danger">
                                            @error('unit')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
