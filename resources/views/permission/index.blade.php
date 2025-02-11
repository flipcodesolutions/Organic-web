@extends('layouts.app')
@section('content')
    <div class="container">
       
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header ">
                <div class="row">
                    <div class="col">
                        <h6>Permission Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Permission</a>
                    </div>
                </div>
            </div>
            @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
            @endsession
            <div class="card-body">                   
                    <table class="table table-bordered mt-2">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @if (count($permission) > 0)
                            @foreach ($permission as $key => $permission1)
                                <tr>
                                    <td>{{ $permission->firstItem() + $key }}</td>
                                    <td><?php
                                    $name = $permission1->name;
                                    $permissionname = str_replace('-', ' ', $name);
                                    ?>
                                        {{ $permissionname }}
                                    </td>
                                    <td>{{ $permission1->guard_name }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('permission.edit') }}/{{ $permission1->id }}">Edit</a>
                                        <a class="btn btn-danger"
                                            href="{{ route('permission.delete') }}/{{ $permission1->id }} ">Delete</a>
                                        <a class="btn btn-info"
                                            href="{{ route('permission.show', $permission1->id) }}">Show</a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" align="center" style="color: red;">
                                    <h3>No Data Record Found</h3>
                                </td>
                            </tr>
                        @endif
                    </table>
                    {!! $permission->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
    <script>
        document.getElementById('perPage').onchange = function() {
            window.location = "{{ $permission->url(1) }}&perPage=" + this.value;
        };
    </script>
@endsection
