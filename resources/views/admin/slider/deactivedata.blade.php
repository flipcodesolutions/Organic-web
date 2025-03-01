@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Slider Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{Route('slider.index')}}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>CityName</th>
                        <th>SliderPos</th>
                        <th>Is_Navigate</th>
                        <th>ScreenName</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($sliders as $sliders)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $sliders->city->city_name_eng }}</td>
                            <td>{{ $sliders->slider_pos }}</td>
                            <td>
                                @if ($sliders->is_navigate=='1')
                                Yes
                        @else
                                No

                        @endif
                            </td>
                            <td>{{ $sliders->navigatemaster->screenname }}</td>
                            <td>
                                <a href="{{Route('slider.active',$sliders->id)}}" class="btn btn-primary">
                                    <i class="fas fa-undo"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{Route('slider.permdelete',$sliders->id)}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

  @endsection
