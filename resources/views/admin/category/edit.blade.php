@extends('layouts.app')
@section('header', 'Category Create')
@section('content')
<div class="container">
    <div class="card shadow-sm  bg-body rounded">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col text-white">
                    <h6 class="mb-0">Update New Category</h6>
                </div>
                <div class="col" align="right">
                    <button class="btn btn-primary" type="button" onclick="javascript:history.go(-1)"> Back </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="categoryForm">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category Name:</strong>
                            <input type="text" name="category_name" id="category_name"
                                value="{{$category->category_name}}" placeholder="Category Name" class="form-control">
                            <span id="category_name_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Parent Category:</strong>
                            <select class="form-select ddCategory" name="parent_id[]" class="form-control">
                                <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>-- select category
                                    --</option>
                                @foreach($categories as $categoryOption)
                                <option value="{{ $categoryOption->id }}" {{ $category->parent_id == $categoryOption->id
                                    ? 'selected' : '' }}>
                                    {{ $categoryOption->category_name }}
                                </option>
                                @endforeach
                            </select>
                            <span id="parent_id_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault(); 
    
                $('#category_name_error').text('');
                $('#parent_id_error').text('');
    
                var formData = $(this).serialize();
    
                $.ajax({
                    url: "{{ route('category.update', $category->id) }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert("Category created successfully!");
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            if (errors.category_name) {
                                $('#category_name_error').text(errors.category_name[0]);
                            }
                            if (errors.parent_id) {
                                $('#parent_id_error').text(errors.parent_id[0]);
                            }
                        } else {
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
@endsection