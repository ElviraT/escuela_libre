@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Cities')</h5>
                        @can('cities.store')
                            <div class="list-btn">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('cities.store') }}" data-bs-target="#city_details"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add City')</a>
                            </div>
                        @endcan
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-center table-hover datatable" width="100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>@lang('Name')</th>
                                                    <th>@lang('Country')</th>
                                                    <th>@lang('State')</th>
                                                    {{-- <th>@lang('Status')</th> --}}
                                                    <th class="no-sort">@lang('Action')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cities as $item)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                {{ $item->name }}
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            {{ $item->country->name }}
                                                        </td>
                                                        <td>
                                                            {{ $item->state->name }}
                                                        </td>
                                                        {{-- <td><span class="badge" --}}
                                                        {{-- style="background-color: #E1FFED !important; --}}
                                                        {{-- color: {{ $item->status->color }} !important;">{{ $item->status->name }}</span> --}}
                                                        {{-- </td> --}}
                                                        <td class="d-flex align-items-center">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class=" btn-action-icon "
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fas fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul>
                                                                        @can('cities.edit')
                                                                            <li>
                                                                                <a href="#" type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#city_details"
                                                                                    class="btn btn-greys me-2"
                                                                                    data-bs-record-id="{{ $item->id }}"
                                                                                    data-bs-action="{{ route('cities.update', $item) }}">
                                                                                    <i class="fa fa-edit me-1"></i>
                                                                                    {{ __('Edit city') }}
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                        @can('cities.destroy')
                                                                            <li>
                                                                                <a class="btn btn-greys me-2"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#confirm-delete"
                                                                                    data-bs-record-id="{{ $item->id }}"
                                                                                    data-bs-record-title="{{ ' La comuna ' }}{{ $item->name }}"
                                                                                    data-bs-action="{{ route('cities.destroy', $item) }}"
                                                                                    title="{{ __('Delete city') }}"><i
                                                                                        class="far fa-trash-alt me-2"></i>@lang('Delete')</a>
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
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('modales.city')
    @include('modales.eliminar')
@endsection
@section('js')
     @include('cities.js')
@endsection
