@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">Deactivated Users</h1>
    </div>
    <a class="btn btn-primary" href="{{ Route('user.index') }}">Back</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Deactive Users</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('user.index') }}">Back</a>
                    </div>
                </div>
            </div> --}}

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('user.deactiveindex') }}" method="GET" class="filter-form">
                    <div class="row align-items-end g-2">

                        <!-- Global Search -->
                        <div class="col">
                            <label for="global" class="form-label"><b>Filter:</b></label>
                            <input type="text" id="global" name="global" value="{{ request('global') }}"
                                class="form-control" placeholder="Search by User Name, Phone number or Email">
                        </div>

                        <!-- naviget screen Filter -->
                        <div class="col">
                            <label for="role" class="form-label"><b>Role:</b></label>
                            <select id="role" name="role" class="form-select">
                                <option value="" selected>Select Role</option>
                                <option value="Admin"{{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Customer"{{ request('role') == 'Customer' ? 'selected' : '' }}>Customer</option>
                                <option value="Manager"{{ request('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                                <option value="Vendor"{{ request('role') == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('user.deactiveindex') }}" class="reset btn">Reset</a>
                        </div>
                    </div>
                </form>
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

                    @if (count($data) > 0)
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><img src="{{ asset('user_profile/' . $user->pro_pic) }}" alt="profile_picture"
                                        class="img-profile rounded-circle" height="100px" width="100px">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('user.active', $user->id) }}" class="edit btn">
                                            <i class="fa-solid fa-undo"></i></a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeleteModal('{{ route('user.delete', $user->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr>
                    @endif
                </table>
                {!! $data->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

    {{-- sweet alert deactive file includ --}}
    {{-- @include('admin.sweetalert.deactive') --}}
@endsection
