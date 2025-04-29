@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CRM Master Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title:{{ $crmMaster->title }}</h5>
            <h5 class="card-subtitle mb-2 ">Slug: {{ $crmMaster->slug }}</h5>
            <h5 class="card-text">Description:{{ $crmMaster->description }}</h5>
            <h5 class="card-text">Status:{{ $crmMaster->status }}</h5>
        </div>
    </div>

    <a href="{{ route('crm-masters.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
