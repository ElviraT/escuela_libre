@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Announcements')</h5>
                        @can('announcements.store')
                            <div class="list-btn">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('announcements.store') }}" data-bs-target="#announcement_details"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Announcement')</a>

                            </div>
                        @endcan
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-center table-hover datatable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Título</th>
                                                    <th>Categoría</th>
                                                    <th>Fecha de publicación</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($announcements as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->category->name }}</td>
                                                        <td>{{ $item->published_at }}</td>
                                                        <td>

                                                            @can('announcements.edit')
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#announcement_details"
                                                                    class="btn btn-greys me-2"
                                                                    data-bs-record-id="{{ $item->id }}"
                                                                    data-bs-action="{{ route('announcements.update', $item) }}">
                                                                    <i class="fa fa-edit me-1"></i>
                                                                    {{ __('Edit Announcement') }}
                                                                </a>
                                                            @endcan

                                                            @can('announcements.destroy')
                                                                <a class="btn btn-greys me-2" data-bs-toggle="modal"
                                                                    data-bs-target="#confirm-delete"
                                                                    data-bs-record-id="{{ $item->id }}"
                                                                    data-bs-record-title="{{ 'el anuncio ' }}{{ $item->name }}"
                                                                    data-bs-action="{{ route('announcements.destroy', $item) }}"
                                                                    title="{{ __('Delete Announcement') }}"><i
                                                                        class="far fa-trash-alt me-2"></i>@lang('Delete')</a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    @include('modales.announcement')
    @include('modales.eliminar')
@endsection

@section('js')
    @include('announcements.js')
@endsection
