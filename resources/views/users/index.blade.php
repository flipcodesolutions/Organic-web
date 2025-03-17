@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">User Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ route('user.deactiveindex') }}">Deactivated Users</a>
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Add</a>
                    </div>
                </div>
            </div>

            {{-- filter --}}
            <div class="mb-4 margin-bottom-30 m-4">
                <form action="{{ route('user.index') }}" method="GET" class="filter-form">
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
                                <option value="admin"{{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="manager"{{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="vendor"{{ request('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                <option value="customer"{{ request('role') == 'customer' ? 'selected' : '' }}>Customer
                                </option>
                            </select>
                        </div>

                        <!-- Submit & Reset Buttons -->
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="filter btn">Filter</button>
                            <a href="{{ route('user.index') }}" class="reset btn">Reset</a>
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
                        <th>Defalut Language</th>
                        <th>Action</th>
                    </tr>

                    @if (count($data) > 0)
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
                                    <div class="d-flex">
                                        <a href="{{ route('user.edit', $user->id) }}" class="edit btn">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ route('user.deactive', $user->id) }}')">
                                            <i class="fa-solid fa-trash"></i>
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
