@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Payments')</h5>
                        @can('payments.store')
                            <div class="list-btn">
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('payments.store') }}" data-bs-target="#payment_details"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Payment')</a>

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
                                                    <th>@lang('Representative')</th>
                                                    <th>@lang('Bank')</th>
                                                    <th>@lang('Monto')</th>
                                                    <th>@lang('Payment Date')</th>
                                                    <th>@lang('Status')</th>
                                                    <th class="no-sort">@lang('Action')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $item)
                                                    <tr>
                                                        <td>{{ $item->representative->user->name . ' ' . $item->representative->user->last_name }}
                                                        </td>
                                                        <td>{{ $item->bank->name }}</td>
                                                        <td>{{ $item->monto }}</td>
                                                        <td>{{ $item->payment_date }}</td>
                                                        <td><span class="badge"
                                                                style="background-color: #E1FFED !important; color: {{ $item->status->color }} !important;">
                                                                {{ $item->status->name }}
                                                            </span>
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class=" btn-action-icon "
                                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                        class="fas fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul>
                                                                        @can('payments.edit')
                                                                            <li>
                                                                                <a href="#" type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#payment_details"
                                                                                    class="btn btn-greys me-2"
                                                                                    data-bs-record-id="{{ $item->id }}"
                                                                                    data-bs-action="{{ route('payments.update', $item) }}">
                                                                                    <i class="fa fa-edit me-1"></i>
                                                                                    {{ __('Edit Payment') }}
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                        @can('payments.destroy')
                                                                            <li>
                                                                                <a class="btn btn-greys me-2"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#confirm-delete"
                                                                                    data-bs-record-id="{{ $item->id }}"
                                                                                    data-bs-record-title="{{ 'el banco ' }}{{ $item->name }}"
                                                                                    data-bs-action="{{ route('payments.destroy', $item) }}"
                                                                                    title="{{ __('Delete Payment') }}"><i
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
    @include('modales.payment')
    @include('modales.eliminar')
@endsection

@section('js')
    @include('payments.js')
@endsection
