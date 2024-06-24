@extends('layouts.admin.base')
@section('content')
    @include('layouts.admin.barra_superior')

    <div class="row">
        @if (Auth::user()->hasAnyRole('Admin', 'SuperAdmin'))
            <div class="col-6">
                <div class="card sombra p-3">
                    <div class="row">
                        <div class="card-table">
                            <div class="card-body">
                                <h5>@lang('Defaulters Of The Month')</h5>
                                <div class="table-responsive">
                                    <table class="table table-center table-hover datatable" width="100%">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="80%">@lang('Representative')</th>
                                                <th width="20%" Class="no-sort">@lang('Actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($morosos as $item)
                                                <tr>
                                                    <td>{{ $item->name . ' ' . $item->last_name }}</td>
                                                    <td class="d-flex align-items-center">

                                                        <a href="#" type="button" class="btn btn-greys btn-sm me-2"
                                                            onclick="recordatorio('{{ $item->id }}')"
                                                            title="{{ __('Reminder') }}">
                                                            <i class="fa fa-envelope me-1"></i>
                                                        </a>

                                                        <a href="#" type="button" class="btn btn-greys btn-sm me-2"
                                                            data-bs-toggle="modal" data-bs-target="#cambiar_status"
                                                            data-bs-record-id="{{ $item->id }}"
                                                            title="{{ __('Change Status') }}"><i
                                                                class="fa fa-user-times me-2"></i>
                                                        </a>
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
        @endif
        <div class="col-6">
            <div class="card sombra p-3">
                <div class="row">
                    <div class="card-table">
                        <div class="card-body">
                            <h5>@lang('Announcements')</h5>
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Categoría</th>
                                            <th>Fecha de publicación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $item)
                                            <tr id="{{ $item->id }}">
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->published_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $announcements->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('modal')
    @include('modales.cambiar_status')
    @include('modales.mostrar')
@endsection
@section('js')
    @include('js')
@endsection
