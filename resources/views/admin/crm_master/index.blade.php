@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CRM Masters</h1>
    <a href="{{ route('crm-masters.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @php
                        $index = 1;
                    @endphp
        </thead>
        <tbody>
            @foreach($crmMasters as $crmMaster)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $crmMaster->title }}</td>
                    <td>{{ $crmMaster->slug }}</td>
                    <td>{{ $crmMaster->description }}</td>
                    <td>{{ $crmMaster->status }}</td>
                    <td>
                        <a href="{{ route('crm-masters.show', $crmMaster->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('crm-masters.edit', $crmMaster->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('crm-masters.destroy', $crmMaster->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
