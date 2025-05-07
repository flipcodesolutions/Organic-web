@extends('visitor.layouts.app')
@section('content')

@endsection









{{-- <ul class="list-group list-group-flush">
    <li class="list-group-item {{ request()->has('categoryId') ? '' : 'active bg-body-tertiary border-light' }}">
        <a href="{{ route('search', ['global' => request('global')]) }}" class="text-decoration-none text-dark">
            <div class="card category-card">
                <div class="row g-0">
                    <div class="col-4 d-flex align-items-center">
                        <img src="{{ asset($category[0]->cat_icon ?? 'images/default.png') }}" alt="" class="img-thumbnail p-0">
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <h6 class="mb-0 text-truncate ms-2">All</h6>
                    </div>
                </div>
            </div>
        </a>
    </li>

    @foreach ($category as $catData)
        <li class="list-group-item {{ request('categoryId') == $catData->id ? 'active bg-body-tertiary border-light' : '' }}">
            <a href="{{ route('search', ['global' => request('global'), 'categoryId' => $catData->id]) }}" class="text-decoration-none text-dark">
                <div class="card category-card">
                    <div class="row g-0">
                        <div class="col-4 d-flex align-items-center">
                            <img src="{{ asset($catData->cat_icon) }}" alt="" class="img-thumbnail p-0">
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <p class="mb-0 text-truncate ms-2">{{ $catData->categoryName }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
</ul> --}}
