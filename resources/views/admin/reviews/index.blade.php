@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header" style="background-color: #19aa5c">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h2 class="mb-4">All Product Reviews</h2>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="loader"></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Review Date</th>
                                <th>Product</th>
                                <th>User</th>
                                <th>Message</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $key => $review)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $review->rev_date }}</td>
                                    <td>{{ $review->product->name ?? 'Unknown' }}</td>
                                    <td>{{ $review->user->name ?? 'Guest' }}</td>
                                    <td>{{ $review->message }}</td>
                                    <td>⭐ {{ $review->star }}/5</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@endsection
