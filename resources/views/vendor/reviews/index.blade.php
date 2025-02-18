
@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Vendor Product Reviews</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Review Date</th>
                <th>Product</th>
                <th>User</th>
                <th>Message</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $index => $review)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $review->rev_date }}</td>
                    <td>{{ $review->product->name ?? 'N/A' }}</td>
                    <td>{{ $review->user->name ?? 'Unknown' }}</td>
                    <td>{{ $review->message }}</td>
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="text-warning">{{ $i <= $review->star ? '★' : '☆' }}</span>
                        @endfor
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($reviews->isEmpty())
        <p class="text-center">No reviews available for your products.</p>
    @endif
</div>

@endsection
