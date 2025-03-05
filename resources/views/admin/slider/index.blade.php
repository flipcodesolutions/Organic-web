@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Slider Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ Route('slider.deactive') }}">Deactive Slider</a>
                        <a class="btn btn-primary" href="{{ Route('slider.create') }}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>CityName</th>
                        <th>Image</th>
                        <th>SliderPos</th>
                        <th>IsNavigate</th>
                        <th>ScreenName</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @if (count($sliders) > 0)
                        @foreach ($sliders as $sliders)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $sliders->city->city_name_eng }}</td>
                                <td>
                                    <img src="{{ asset('sliderimage/' . $sliders->url) }}" alt="" width="180px"
                                        height="120px">
                                </td>
                                <td>{{ $sliders->slider_pos }}</td>

                                <td>
                                    @if ($sliders->is_navigate == '1')
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                {{-- <td>{{ $sliders->navigatemaster->screenname }}</td> --}}
                                <td>{{ $sliders->navigatemaster ? $sliders->navigatemaster->screenname : 'N/A' }}</td>


                                <td>
                                    <div class="d-flex">
                                        <a href="{{ Route('slider.edit', $sliders->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeactiveModal('{{ Route('slider.delete', $sliders->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection
