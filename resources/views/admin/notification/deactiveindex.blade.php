@extends('layouts.app')
@section('header', 'Category')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Deactive Notifications</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ route('notification.index') }}">Back</a>
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
                                    <a href="{{ route('notification.active') }}/{{ $data->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeleteModal('{{ route('notification.delete') }}/{{ $data->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    {{-- <a href="{{ route('notification.delete') }}/{{ $data->id }}"
                                        class="btn btn-danger">
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
