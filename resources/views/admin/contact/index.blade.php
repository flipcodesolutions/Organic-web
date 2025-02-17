@extends('layouts.app')
@section('content')
{{--  @if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif  --}}
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0"> Contact </h6>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Contact</th>
                        <th>Email</th>
                    </tr>
                <tr>
                        <td>Fruit Enquiry</td>
                        <td>want 2kg Oranges</td>
                        <td>9897969594</td>
                        <td>gunjan@gmail.com</td>
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
@endsection
