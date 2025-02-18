@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manage Reviews</h2>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Review Date</th>
                <th>Product</th>
                <th>User</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Action</th>
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
                    <td>
                        <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($reviews->isEmpty())
        <p class="text-center">No reviews available.</p>
    @endif
</div>@endsection
