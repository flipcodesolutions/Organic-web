@extends('layouts.app')
@section('content')
    @if (Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
    @endif
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Users Management</h6>
                    </div>
                    <div class="col" align="right">
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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                    
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="{{ $user->pro_pic}}" alt="profile_picture" class="img-profile rounded-circle">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{ route('user.deactive', $user->id) }}')">
                                    <i class="fas fa-trash"></i>
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
    @include('admin.sweetalert.deactive')
@endsection