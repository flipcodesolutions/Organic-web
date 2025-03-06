@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Update New Faq</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('faq.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="faq" method="post" action="{{ Route('faq.update', $faqs->id) }}" class="form">
                    @csrf
                    {{-- Faq --}}
                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-3 col-md-12">
                            Question <span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="question" value="{{ $faqs->question }}"
                                            class="form-control" id="floatingInput" placeholder="question">
                                        <label for="floatingInput">Enter question english</label>
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
                                    <div class="form-floating mb-3">
                                        <input type="text" name="questionguj" value="{{ $faqs->questionGuj }}"
                                            class="form-control" id="floatingInput" placeholder="questionguj">
                                        <label for="floatingInput">Enter question gujarati</label>
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
                                    <div class="form-floating mb-3">
                                        <input type="text" name="questionhin" value="{{ $faqs->questionHin }}"
                                            class="form-control" id="floatingInput" placeholder="questionhin">
                                        <label for="floatingInput">Enter question hindi</label>
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
                            Answer<span class="text-danger">*</span>
                        </div>
                        <div class="col">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="answer" value="{{ $faqs->answer }}"
                                            class="form-control" id="floatingInput" placeholder="answer">
                                        <label for="floatingInput">Enter answer english</label>
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
                                    <div class="form-floating mb-3">
                                        <input type="text" name="answerguj" value="{{ $faqs->answerGuj }}"
                                            class="form-control" id="floatingInput" placeholder="answerguj">
                                        <label for="floatingInput">Enter answer gujarati</label>
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
                                    <div class="form-floating mb-3">
                                        <input type="text" name="answerhin" value="{{ $faqs->answerHin }}"
                                            class="form-control" id="floatingInput" placeholder="answerhin">
                                        <label for="floatingInput">Enter answer hindi</label>
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
