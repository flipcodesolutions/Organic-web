@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Product Reviews</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Review Date</th>
                <th>Product</th>
                <th>Message</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $key => $review)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $review->rev_date }}</td>
                <td>{{ $review->product->name ?? 'Unknown' }}</td>
                <td>{{ $review->message }}</td>
                <td>⭐ {{ $review->star }}/5</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $reviews->links() }}
</div>
@endsection
