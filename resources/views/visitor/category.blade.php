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
            <a href="" class="childcategory">
               <div class="chlidcategoryname ms-5"> All</div></a>
            @foreach ($childCategory as $catData)
                <a href="" class="childcategory d-flex">
                    <div class="childcategoryimage">
                        <img src="{{ asset($catData->cat_icon) }}" alt="">
                    </div>
                    <div class="chlidcategoryname">{{ $catData->categoryName }}</div>
                </a>
            @endforeach
            {{-- <a href="" class="childcategory d-flex">
                <div class="childcategoryimage">
                    <img src="DaawatRozanaBasmatiRice.jpeg" alt="">
                </div>
                <div class="chlidcategoryname">
                    DaawatRozanaBasmatiRice
                </div>
            </a>
            <a href="" class="childcategory d-flex">
                <div class="childcategoryimage">
                    <img src="FORTUNEXpertProImmunityBlendedOil.jpeg" alt="">
                </div>
                <div class="chlidcategoryname">
                    FORTUNEXpertProImmunityBlendedOil
                </div>
            </a> --}}
        </nav>

        <div class="Product-container" style="padding: 30px 75px 0;">
            <div class="col mb-3">
                <h1>Products</h1>
            </div>

            <div class="childcategoryTable" style="display: grid;   grid-template-columns: auto auto auto auto; gap: 50px;">
                @foreach ($childCategory as $childData)
                    {{-- @if (!$childData->products) --}}
                    @foreach ($childData->products as $productData)
                        <div class="col">
                            <div class="childCategoryImage" style="border: 1px solid black; border-radius: 50%;">
                                <img src="{{ asset($productData->image) }}" alt="" style="border-radius: 50%;">
                            </div>
                            <div class="categoryname" style="text-align: center;">
                                {{ $productData->productName }}
                            </div>
                        </div>
                    @endforeach
                    {{-- @endif --}}
                @endforeach
                {{-- <div class="col">
                    <div class="childCategoryImage" style="border: 1px solid black; border-radius: 50%;">
                        <img src="AashirvaadAtta.jpeg" alt="" style="border-radius: 50%;">
                    </div>
                    <div class="categoryname" style="text-align: center;">
                        Aashirvaad
                    </div>
                </div>
                <div class="col">
                    <div class="childCategoryImage" style="border: 1px solid black; border-radius: 50%;">
                        <img src="AashirvaadAtta.jpeg" alt="" style="border-radius: 50%;">
                    </div>
                    <div class="categoryname" style="text-align: center;">
                        Aashirvaad
                    </div>
                </div>
                <div class="col">
                    <div class="childCategoryImage" style="border: 1px solid black; border-radius: 50%;">
                        <img src="AashirvaadAtta.jpeg" alt="" style="border-radius: 50%;">
                    </div>
                    <div class="categoryname" style="text-align: center;">
                        Aashirvaad
                    </div>
                </div>
                <div class="col">
                    <div class="childCategoryImage" style="border: 1px solid black; border-radius: 50%;">
                        <img src="AashirvaadAtta.jpeg" alt="" style="border-radius: 50%;">
                    </div>
                    <div class="categoryname" style="text-align: center;">
                        Aashirvaad
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
