@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>Gestionar Solicitudes de Ausencia</h5>
                        @can('leaves.create')
                            <div class="list-btn">
                                <a class="btn btn-primary" href="{{ route('leaves.create.view') }}"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Leave')</a>
                            </div>
                        @endcan
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if (count($leaves) > 0)
                                            <table class="table table-center table-hover datatable" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('Name')</th>
                                                        <th>Tipo de Ausencia</th>
                                                        <th>Fecha de Inicio</th>
                                                        <th>Fecha de Fin</th>
                                                        <th>Motivo</th>
                                                        <th>@lang('Status')</th>
                                                        <th>@lang('Actions')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($leaves as $leave)
                                                        <tr>
                                                            <td>{{ $leave->user->name . ' ' . $leave->user->last_name }}
                                                            </td>
                                                            <td>{{ $leave->leaveType->name }}</td>
                                                            <td>{{ $leave->start_date }}</td>
                                                            <td>{{ $leave->end_date }}</td>
                                                            <td>{{ $leave->reason }}</td>
                                                            <td>
                                                                @if ($leave->status == 'pending')
                                                                    <span class="badge"
                                                                        style="background-color: #E1FFED !important;color: #f5df18 !important;">
                                                                        {{ 'Pendiente' }}
                                                                    </span>
                                                                @elseif ($leave->status == 'approved')
                                                                    <span class="badge"
                                                                        style="background-color: #E1FFED !important;color: #46db18 !important;">
                                                                        {{ 'Aprobada' }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge"
                                                                        style="background-color: #E1FFED !important;color: #bd0808 !important;">
                                                                        {{ 'Rechazada' }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($leave->status === 'pending')
                                                                    <form method="POST"
                                                                        action="{{ route('leaves.approve', $leave->id) }}">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-success paid-continue-btn mb-1"
                                                                            title="@lang('Approve')"><i
                                                                                class="fa fa-check me-1"></i></button>
                                                                    </form>
                                                                    <form method="POST"
                                                                        action="{{ route('leaves.reject', $leave->id) }}">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger paid-continue-btn mb-1"
                                                                            title="@lang('Reject')"><i
                                                                                class="fa fa-times me-1"></i></button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p class="text-center mt-5">No hay solicitudes de ausencia pendientes.</p>
                                        @endif
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
