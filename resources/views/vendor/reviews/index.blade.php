@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Vendor Product Reviews</h6>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="loader"></div>
            <table class="table table-bordered mt-2">

                    <tr>
                        <th>#</th>
                        <th>Review Date</th>
                        <th>Product</th>
                        <th>Message</th>
                        <th>Rating</th>
                    </tr>

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
    </div>
</div>
@endsection
