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
                        <a class="b1 btn btn-danger" href="{{ Route('slider.deactive') }}">Deactive Slider</a>
                        <a class="btn btn-primary" href="{{ Route('slider.create') }}">Add</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ Route('slider.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        {{-- <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by CityName">
                        </div> --}}

                        <!--cityname  Filter -->
                        <div class="col">
                            <label for="city_id" class="form-label"><b>City Name:</b></label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option selected disabled>Select your CIty</option>
                                @foreach ($cities as $cities)
                                    <option value="{{ $cities->id }}"
                                        {{ request('city_id') == $cities->id ? 'selected' : '' }}>
                                        {{ $cities->city_name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--sliderpos  Filter -->
                        <div class="col">
                            <label for="slider_pos" class="form-label"><b>Slider Position:</b></label>
                            <select name="slider_pos" id="slider_pos" class="form-control">
                                <option selected disabled>Select your SliderPosition</option>
                                <option value="top"{{ request('slider_pos') == 'top' ? 'selected' : '' }}>Top</option>
                                <option value="bottom"{{ request('slider_pos') == 'bottom' ? 'selected' : '' }}>Bottom
                                </option>
                                <option value="middle"{{ request('slider_pos') == 'middle' ? 'selected' : '' }}>Middle
                                </option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ Route('slider.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>CityName</th>
                        <th>Image</th>
                        <th>SliderPosition</th>
                        <th>IsNavigate</th>
                        <th>ScreenName</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @if (count($data) > 0)
                        @foreach ($data as $sliders)
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
