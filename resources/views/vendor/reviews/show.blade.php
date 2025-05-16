@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Product Details --}}
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
        </div>
    </div>

    {{-- Reviews Section --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5>Customer Reviews</h5>
        </div>
        <div class="card-body">
            @if($product->reviews->count() > 0)
                <ul class="list-group">
                    @foreach($product->reviews as $review)
                        <li class="list-group-item">
                            <strong>{{ $review->user->name ?? 'User' }}</strong>
                            <span class="float-end">⭐ {{ $review->star }}/5</span>
                            <br>
                            <small class="text-muted">{{ $review->rev_date->format('d M Y') }}</small>
                            <p class="mb-0">{{ $review->message }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No reviews yet.</p>
            @endif
        </div>
    </div>

    {{-- Leave a Review Form (Customer only) --}}
    @auth
        @if(Auth::user()->role == 'customer')
            {{-- Optional: Check if the user has already reviewed this product --}}
            {{-- You can move this logic to controller if preferred --}}
            @php
                $alreadyReviewed = $product->reviews->where('user_id', Auth::id())->count() > 0;
            @endphp

            @if(!$alreadyReviewed)
                <div class="card">
                    <div class="card-header">
                        <h5>Leave a Review</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label for="star" class="form-label">Rating</label>
                                <select name="star" id="star" class="form-control" required>
                                    <option value="">Choose rating</option>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Review</label>
                                <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    You've already submitted a review for this product.
                </div>
            @endif
        @endif
    @else
        <p><a href="{{ route('login') }}">Login</a> to leave a review.</p>
    @endauth
</div>
@endsection
