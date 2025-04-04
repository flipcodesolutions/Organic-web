@extends('visitor.layouts.app')
@section('content')
    <style>
        .childCategoryList {
            background-color: #878587;
        }

        .childcategory {
            gap: 10px;
            text-decoration: none;
            padding: 10px;
        }

        .childcategory:hover {
            background-color: black;
        }

        .chlidcategoryname {
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* max-width: calc(100% - 110px); */
            color: white;
        }

        .childcategoryimage {
            width: 56px;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        .childcategoryimage img {
            height: 76px;
            width: 46px;
        }
    </style>

    <div class="container-fluid d-flex">

        <nav class="childCategoryList" style="width: 300px; min-height: 700px;">
            <h3 style="margin-left: 10px;">Categories</h3>
            <a href="{{ route('home.category', ['id' => request()->route('id')]) }}" class="childcategory d-flex">
                @foreach ($category as $categoryData)
                    @if ($categoryData->id == request()->route('id'))
                        <div class="childcategoryimage">
                            <img src="{{ asset($categoryData->cat_icon) }}" alt="">
                        </div>
                    @endif
                @endforeach
                <div class="chlidcategoryname">All</div>
            </a>
            @foreach ($childcategory as $catData)
                <a href="{{ route('home.category', ['id' => request()->route('id')]) }}?categoryId={{ $catData->id }}"
                    class="childcategory d-flex">
                    <div class="childcategoryimage">
                        <img src="{{ asset($catData->cat_icon) }}" alt="">
                    </div>
                    <div class="chlidcategoryname">{{ $catData->categoryName }}</div>
                </a>
            @endforeach
        </nav>

        <div class="Product-container" style="padding: 30px 75px 0; background-color: rgb(244, 246, 251);">
            <div class="col mb-3">
                <h1>Products</h1>
            </div>
            <div class="childcategoryTable" style="display: grid;   grid-template-columns: auto auto auto auto; gap: 50px;">
                @foreach ($product as $productData)
                    <a href="{{ route('home.product') }}/{{ $productData->id }}"
                        style="text-decoration: none; color: black;">
                        <div class="col">
                            <div class="childCategoryImage d-flex"
                                style="border: 1px solid black; border-radius: 50%; justify-content: center">
                                <img src="{{ asset($productData->image) }}" alt=""
                                    style="height: 225px; width: 225px;">
                            </div>
                            <div class="categoryname" style="text-align: center;">
                                {{ $productData->productName }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
