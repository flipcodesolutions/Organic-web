@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update New DeliverySlot</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{Route('deliveryslot.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="deliveryslotform" method="post" action="{{Route('deliveryslot.update',$deliveryslot->id)}}">
                    @csrf
                    {{-- deliveryslot --}}
                    {{--start time--}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            startTime<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="time" name="starttime" id="" value="{{$deliveryslot->startTime}}" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('starttime')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--end time--}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            endTime<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="time" name="endtime" id="" value="{{$deliveryslot->endTime}}" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('endtime')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--isavailable--}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            isAvailable<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <select name="isavailable" id=""  class="form-control">
                                            <option value="Yes"{{$deliveryslot->isAvailable=='yes'?'selected':''}}>Yes</option>
                                            <option value="No"{{$deliveryslot->isAvailable=='no'?'selected':''}}>No</option>
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
                    </div>



                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
