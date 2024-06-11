@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Folders')</h5>
                        {{-- @can('regiones.store') --}}
                        <div class="list-btn">
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                data-bs-action="{{ route('folders.store') }}" data-bs-target="#folder_add"><i
                                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Folder')</a>
                        </div>
                        {{-- @endcan --}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($folders as $item)
                                            <div class="col-xl-3 col-sm-6 col-12">
                                                <div class="card sombra">
                                                    <a href="{{ route('folders.show', $item->id) }}"
                                                        onclick=" loading_show();">
                                                        <div class="card-body">
                                                            <div class="dash-widget-header">
                                                                <span class="dash-widget-icon bg-2">
                                                                    <i class="fas fa-folder"></i>
                                                                </span>
                                                                <div class="dash-count">
                                                                    <div class="dash-title"><b>{{ $item->name }}</b></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('modales.folder')
@endsection
@section('js')
    @include('my_unit.folders.js')
@endsection
