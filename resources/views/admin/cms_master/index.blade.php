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
                        <a class="btn btn-danger" href="{{ Route('cms_master.deactive') }}">Deactive-Data</a>
                        <a class="btn btn-primary" href="{{ Route('cms_master.create') }}">Add</a>
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
                        @foreach ($cms_masters as $cms)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $cms->title }}</li>
                                        <li>{{ $cms->titleGuj }}</li>
                                        <li>{{ $cms->titleHin }}</li>
                                    </ul>
                                </td>
                                <td>{{ $cms->slug }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $cms->description }}</li>
                                        <li>{{ $cms->descriptionGuj }}</li>
                                        <li>{{ $cms->descriptionHin }}</li>
                                    </ul>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ Route('cms_master.edit', $cms->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger ml-2"
                                        onclick="openDeactiveModal('{{ Route('cms_master.delete', $cms->id) }}')">
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
