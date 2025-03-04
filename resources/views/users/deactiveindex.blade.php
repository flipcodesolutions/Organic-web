@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Deactive Users</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('user.index') }}">Back</a>
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
                        <th width="280px">Action</th>
                    </tr>

                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ asset('user_profile/'.$user->pro_pic)}}" alt="profile_picture" class="img-profile rounded-circle" height="100px" width="100px">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td>
                                <a href="{{ route('user.active', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                    onclick="openDeleteModal('{{ route('user.delete', $user->id) }}')">
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
    {{-- @include('admin.sweetalert.deactive') --}}
@endsection