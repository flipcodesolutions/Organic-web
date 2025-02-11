@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header ">
            <div class="row">
                <div class="col">
                    <h6>Role Management</h6>
                </div>
                <div class="col" align="right">
                    @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                    @endcan
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
                <th>Action</th>
            </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i
                            class="fa-solid fa-list"></i> Show</a>
                    @can('role-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i
                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                    @endcan

                    @can('role-delete')
                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                            Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
        {!! $roles->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection