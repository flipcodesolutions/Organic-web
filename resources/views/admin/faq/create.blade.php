@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Create New Faq</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('faq.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="faq" method="post" action="{{ Route('faq.store') }}">
                    @csrf
                    {{-- Faq --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            question <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="question" id="" value="{{ old('question') }}"
                                            placeholder="Enter Question English" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('question')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="questionguj" id="" value="{{ old('questionguj') }}"
                                            placeholder="Enter Question Gujarati" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('questionguj')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="questionhin" id="" value="{{ old('questionhin') }}"
                                            placeholder="Enter Question Hindi" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('questionhin')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- Faq answer --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            answer<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="answer" id="" value="{{ old('answer') }}"
                                            placeholder="Enter Answer English" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('answer')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="answerguj" id=""   value="{{ old('answerguj') }}"
                                            placeholder="Enter Answer Giujarati" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('answerguj')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="answerhin" id="" value="{{ old('answerhin') }}"
                                            placeholder="Enter Answer Hindi" class="form-control">
                                        <span id="nameError" class="text-danger">
                                            @error('answerhin')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                    class="fa-solid fa-floppy-disk"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
