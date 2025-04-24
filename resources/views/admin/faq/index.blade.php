@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-1 text-gray-800">FAQs Management</h1>
    </div>
    <a class="btn btn-danger mr-1" href="{{ Route('faq.deactive') }}">Deactivated FAQs</a>
    <a class="btn btn-primary" href="{{ Route('faq.create') }}">Add</a>
</div>

<div class="card-body p-0">

        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">FAQs Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="btn btn-danger" href="{{ Route('faq.deactive') }}">Deactivated FAQs</a>
                        <a class="btn btn-primary" href="{{ Route('faq.create') }}">Add</a>
                    </div>
                </div>
            </div> --}}
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
                    @if (count($faqs) > 0)
                        @foreach ($faqs as $faqs)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>
                                    {{ $faqs->question }}
                                    {{-- <ul>
                                        <li>{{ $faqs->question }}</li>
                                        <li>{{ $faqs->questionGuj }}</li>
                                        <li>{{ $faqs->questionHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    {{ $faqs->answer }}
                                    {{-- <ul>
                                        <li>{{ $faqs->answer }}</li>
                                        <li>{{ $faqs->answerGuj }}</li>
                                        <li>{{ $faqs->answerHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ Route('faq.edit', $faqs->id) }}" class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ Route('faq.delete', $faqs->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr>
                    @endif
                </table>
                {{-- table end --}}


            </adiv>
        </div>
    </div>

@endsection
