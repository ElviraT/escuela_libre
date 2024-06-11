@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>{{ $folders->name }}</h5>
                        <div class="list-btn">
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                data-bs-action="{{ route('folders.store.subfolder') }}"
                                data-bs-record-id="{{ $folders->id }}" data-bs-target="#folder_add"><i
                                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Folder')</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="row">
                                        <h5>@lang('Folders and File')</h5>
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
