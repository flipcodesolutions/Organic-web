@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col  text-white mt-2">
                    <h6 class="mb-0 notificationh6">Notification Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px; padding:0">
                        <a class="b1 btn btn-danger" href="{{ route('notification.deactiveindex') }}">Deactive Notifications
                        </a>
                        <a class="btn btn-primary" href="{{ route('notification.create') }}">Add</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('notification.index') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by Title or Description">
                        </div>

                        <!-- naviget screen Filter -->
                        <div class="col">
                            <label for="navigateScreen" class="form-label"><b>Navigate Screen:</b></label>
                            <select id="navigateScreen" name="navigateScreen" class="form-select">
                                <option value="" selected>Select Navigate Screen</option>
                                @foreach ($screen as $screendata)
                                    <option value="{{ $screendata->screenname }}"{{ request('navigateScreen') == $screendata->screenname ? 'selected' : '' }}>{{ $screendata->screenname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('notification.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Details Description</th>
                        <th>Navigate Screen</th>
                        <th>Action</th>
                    </tr>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $data->title }}
                                    {{-- <ul>
                                        <li> {{ $data->title }} </li>
                                        <li> {{ $data->titleGuj }} </li>
                                        <li> {{ $data->titleHin }} </li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {!! $data->details !!}
                                    {{-- <ul>
                                        <li> {{ $data->details }} </li>
                                        <li> {{ $data->detailsGuj }} </li>
                                        <li> {{ $data->detailsHin }} </li>
                                    </ul> --}}
                                </td>
                                <td>{{ $data->navigate_screen }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('notification.edit') }}/{{ $data->id }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                            onclick="openDeactiveModal('{{ route('notification.deactive') }}/{{ $data->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    {{-- <a href="{{ route('notification.deactive') }}/{{ $data->id }}" class="btn btn-danger">
                                        <i class="fas fa-remove"></i>
                                    </a> --}}
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
                {{-- table end --}}
                {{-- {!! $categories->links('pagination::bootstrap-5') !!} --}}

            </div>
        </div>
    </div>
@endsection
