@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col text-white">
                        <h6 class="mb-0">Cms_Master Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ Route('cms_master.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <adiv class="card-body table-responsive">
                <div class="loader"></div>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $index = 1;
                    @endphp
                    @if (count($cms_masters) > 0)
                        @foreach ($cms_masters as $cms_masters)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $cms_masters->title }}</li>
                                        <li>{{ $cms_masters->titleGuj }}</li>
                                        <li>{{ $cms_masters->titleHin }}</li>
                                    </ul>
                                </td>
                                <td>{{ $cms_masters->slug }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $cms_masters->description }}</li>
                                        <li>{{ $cms_masters->descriptionGuj }}</li>
                                        <li>{{ $cms_masters->descriptionHin }}</li>
                                    </ul>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ Route('cms_master.active', $cms_masters->id) }}" class="btn btn-primary">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeleteModal('{{ Route('cms_master.permdelete', $cms_masters->id) }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>

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
