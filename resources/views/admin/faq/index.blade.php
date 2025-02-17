@extends('layouts.app')
@section('content')
@if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif
    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Faq Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{Route('faq.create')}}">Add</a>
                    </div>
                </div>
            </div>
            <adiv class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($faqs as $faqs)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>
                                <ul>
                                    <li>{{$faqs->question}}</li>
                                    <li>{{$faqs->questionGuj}}</li>
                                    <li>{{$faqs->questionHin}}</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>{{$faqs->answer}}</li>
                                    <li>{{$faqs->answerGuj}}</li>
                                    <li>{{$faqs->answerHin}}</li>
                                </ul>
                            </td>
                            <td>
                                <a href="{{Route('faq.edit',$faqs->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                    {{-- <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr> --}}

                </table>
                {{-- table end --}}


            </adiv>
        </div>
    </div>
@endsection
