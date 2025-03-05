@extends('layouts.app')
@section('content')
    @if (Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
    @endif
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">Users Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ route('user.deactiveindex') }}">Deactive Users</a>
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>User image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Defalut Language</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="{{ asset('user_profile/' . $user->pro_pic) }}" alt="profile_picture"
                                    class="img-profile rounded-circle" height="100px" width="100px">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->default_language }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeactiveModal('{{ route('user.deactive', $user->id) }}')">
                                    <i class="fas fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $data->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

    {{-- sweet alert deactive file includ --}}
    {{-- @include('admin.sweetalert.deactive') --}}
@endsection
