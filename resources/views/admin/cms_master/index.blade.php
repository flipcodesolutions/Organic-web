@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">CmsMaster Management</h1>
    </div>
    <a class="b1 btn btn-danger mr-1" href="{{ Route('cms_master.deactive') }}">Deactivated CmsMasters</a>
    <a class="btn btn-primary" href="{{ Route('cms_master.create') }}">Add</a>
</div>

<div class="card-body p-0">
        <div class="card shadow-sm  bg-body rounded">
            {{-- <div class="card-header d-flex">
                <div class="col text-white mt-2">
                    <h6 class="mb-0">CmsMaster Management</h6>
                </div>
                <div class="heading row align-items-center">
                    <div class="col d-flex align="right" style="gap: 3px">
                        <a class="b1 btn btn-danger" href="{{ Route('cms_master.deactive') }}">Deactivated CmsMasters</a>
                        <a class="btn btn-primary" href="{{ Route('cms_master.create') }}">Add</a>
                    </div>
                </div>
            </div> --}}
            <div class="card-body table-responsive">
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
                                    {{ $cms->title }}
                                    {{-- <ul>
                                        <li>{{ $cms->title }}</li>
                                        <li>{{ $cms->titleGuj }}</li>
                                        <li>{{ $cms->titleHin }}</li>
                                    </ul> --}}
                                </td>
                                <td>{{ $cms->slug }}</td>
                                <td>
                                    {!! $cms->description !!}
                                    {{-- <ul>
                                        <li>{!! $cms->description !!}</li>
                                        <li>{!! $cms->descriptionGuj !!}</li>
                                        <li>{!! $cms->descriptionHin !!}</li>
                                    </ul> --}}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ Route('cms_master.edit', $cms->id) }}" class="edit btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete btn ml-2"
                                            onclick="openDeactiveModal('{{ Route('cms_master.delete', $cms->id) }}')">
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
