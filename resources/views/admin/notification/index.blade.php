@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col  text-white mt-2">
                    <h6 class="mb-0">Notification Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px; padding:0">
                        <a class="b1 btn btn-danger" href="{{ route('notification.deactiveindex') }}">Deactive Notifications </a>
                        <a class="btn btn-primary" href="{{ route('notification.create') }}">Add</a>
                    </div>
                </div>
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
                @if (count($notification) > 0)
                    @foreach ($notification as $key => $data)
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
                                <a href="{{ route('notification.edit') }}/{{ $data->id }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeactiveModal('{{ route('notification.deactive') }}/{{ $data->id }}')">
                                    <i class="fas fa-remove"></i>
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
