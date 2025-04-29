@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit CRM Master</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('crm-masters.update', $crmMaster->id) }}" method="POST">
        @csrf
        @method('PUT')



        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $crmMaster->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $crmMaster->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ $crmMaster->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $crmMaster->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
