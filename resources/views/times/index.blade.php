@extends('layouts.admin.base')

@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Times')</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Filter"><span class="me-2"><img src="{{ asset('assets/img/icons/filter-icon.svg') }}"
                                        alt="filter"></span>Filter
                            </a>
                        </li>
                        @can('times.store')
                            <li>
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('times.store') }}" data-bs-target="#add_time"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Time')</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>@lang('Teacher')</th>
                                        <th>@lang('Day')</th>
                                        <th>@lang('Start Time') </th>
                                        <th>@lang('End Time')</th>
                                        <th Class="no-sort">@lang('Actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($times as $item)
                                        <tr>
                                            <td>{{ $item->teacher->user->name . ' ' . $item->teacher->user->last_name }}
                                            </td>
                                            <td>{{ $item->day->name }}</td>
                                            <td>{{ $item->start_hour }}</td>
                                            <td>{{ $item->end_hour }}</td>
                                            <td class="d-flex align-items-center">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul>
                                                            @can('times.edit')
                                                                <li>
                                                                    <a href="#" type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#add_time" class="btn btn-greys me-2"
                                                                        data-bs-record-id="{{ $item->id }}"
                                                                        data-bs-action="{{ route('times.update', $item) }}">
                                                                        <i class="fa fa-edit me-1"></i>
                                                                        {{ __('Edit Time') }}
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                            @can('times.destroy')
                                                                <li>
                                                                    <a class="btn btn-greys me-2" data-bs-toggle="modal"
                                                                        data-bs-target="#confirm-delete"
                                                                        data-bs-record-id="{{ $item->id }}"
                                                                        data-bs-record-title="{{ 'la disponibilidad ' }}"
                                                                        data-bs-action="{{ route('times.destroy', $item) }}"
                                                                        title="{{ __('Delete Time') }}"><i
                                                                            class="far fa-trash-alt me-3"></i>@lang('Delete')</a>
                                                                </li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </div>
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
@endsection
@section('modal')
    @include('modales.time')
    @include('modales.eliminar')
@endsection
@section('js')
    @include('times.js')
@endsection
