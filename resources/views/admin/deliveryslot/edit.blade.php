@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Edit DeliverySlot</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('deliveryslot.index') }}">Back</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0" style="width: 200px">Update New DeliverySlots</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('deliveryslot.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form id="deliveryslotform" method="post" action="{{ Route('deliveryslot.update', $deliveryslot->id) }}"
                    class="form">
                    @csrf
                    {{-- deliveryslot --}}
                    {{-- start time --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            StartTime<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="time" name="starttime" id=""
                                            value="{{ $deliveryslot->startTime }}" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('starttime')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end time --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            EndTime<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="time" name="endtime" id=""
                                            value="{{ $deliveryslot->endTime }}" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('endtime')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- isavailable --}}
                    {{-- <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            IsAvailable<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <select name="isavailable" id=""  class="form-control">
                                            <option selected disabled>--Select your isavailable--</option>
                                            <option value="Available"{{$deliveryslot->isAvailable=='Available'?'selected':''}}>Available</option>
                                            <option value="NotAvailable"{{$deliveryslot->isAvailable=='NotAvailable'?'selected':''}}>NotAvailable</option>
                                        </select>
                                        <span id="nameError" class="text-danger">
                                            @error('isavailable')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- is Available --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Is Available
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" name="isavailable" type="checkbox" value="true"
                                    @if ($deliveryslot->isAvailable == 'yes') checked @endif id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Make it available
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="update btn" id="Update"><i class="fa-solid fa-floppy-disk"></i>
                                Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
