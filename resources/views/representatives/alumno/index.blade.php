@extends('layouts.admin.base')

@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Students')</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Filter"><span class="me-2"><img src="{{ asset('assets/img/icons/filter-icon.svg') }}"
                                        alt="filter"></span>@lang('Filter')
                            </a>
                        </li>
                        @can('representatives.alumno.store')
                            <li>
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                    data-bs-action="{{ route('representatives.alumno.store') }}" data-bs-target="#add_alumno"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>@lang('Add Student')</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body p-3">
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-center table-hover datatable" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Relationship')</th>
                                    <th>@lang('Is Alergy?')</th>
                                    <th>@lang('Is Disability?')</th>
                                    <th>@lang('Created on')</th>
                                    <th>@lang('Status')</th>
                                    <th Class="no-sort">@lang('Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $item)
                                    <tr>
                                        <td>{{ $item->name }}&nbsp;{{ $item->last_name }}</td>
                                        <td>{{ $item->relacion->name }}</td>
                                        <td>
                                            <div class="status-toggle">
                                                <input id="alergy" class="check" type="checkbox"
                                                    {{ $item->is_alergy == 1 ? 'checked' : '' }} disabled>
                                                <label for="alergy"
                                                    class="checktoggle checkbox-bg">@lang('Disability')</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="status-toggle">
                                                <input id="disability" class="check" type="checkbox"
                                                    {{ $item->is_disability == 1 ? 'checked' : '' }} disabled>
                                                <label for="disability"
                                                    class="checktoggle checkbox-bg">@lang('Disability')</label>
                                            </div>
                                        </td>
                                        <td>{{ $item->created_at->format('j F, Y, g:i A') }}</td>
                                        <td><span class="badge"
                                                style="background-color: #E1FFED !important;
                                            color: {{ $item->status->color }} !important;">{{ $item->status->name }}</span>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul>
                                                        @can('representatives.alumno.edit')
                                                            <li>
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#add_alumno" class="btn btn-greys me-2"
                                                                    data-bs-record-id="{{ $item->id }}"
                                                                    data-bs-action="{{ route('representatives.alumno.update', $item) }}">
                                                                    <i class="fa fa-edit me-1"></i>
                                                                    {{ __('Edit Student') }}
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('representatives.alumno.destroy')
                                                            <li>
                                                                <a class="btn btn-greys me-2" data-bs-toggle="modal"
                                                                    data-bs-target="#confirm-delete"
                                                                    data-bs-record-id="{{ $item->id }}"
                                                                    data-bs-record-title="{{ 'El Alumno ' }}{{ $item->name }}&nbsp;{{ $item->last_name }}"
                                                                    data-bs-action="{{ route('representatives.alumno.destroy', $item) }}"
                                                                    title="{{ __('Delete Student') }}"><i
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
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('filtros')
    <div class="toggle-sidebar">
        <div class="sidebar-layout-filter">
            <div class="sidebar-header">
                <h5>Filter</h5>
                <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="sidebar-body">
                <form action="#" autocomplete="off">

                    <div class="accordion" id="accordionMain1">
                        <div class="card-header-new" id="headingOne">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Customer
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample1">
                            <div class="card-body-chat">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="checkBoxes1">
                                            <div class="form-custom">
                                                <input type="text" class="form-control" id="member_search1"
                                                    placeholder="Search here">
                                                <span><img src="{{ asset('assets/img/icons/search.svg') }}"
                                                        alt="img"></span>
                                            </div>
                                            <div class="selectBox-cont">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> John Smith
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Johnny
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Robert
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Sharonda
                                                </label>

                                                <div class="view-content">
                                                    <div class="viewall-One">
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Pricilla
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Randall
                                                        </label>
                                                    </div>
                                                    <div class="view-all">
                                                        <a href="javascript:void(0);" class="viewall-button-One"><span
                                                                class="me-2">View
                                                                All</span><span><i
                                                                    class="fa fa-circle-chevron-down"></i></span></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accordion" id="accordionMain2">
                        <div class="card-header-new" id="headingTwo">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Select Date
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample2">
                            <div class="card-body-chat">
                                <div class="input-block mb-3">
                                    <label class="form-control-label">From</label>
                                    <div class="cal-icon">
                                        <input type="email" class="form-control datetimepicker"
                                            placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="form-control-label">To</label>
                                    <div class="cal-icon">
                                        <input type="email" class="form-control datetimepicker"
                                            placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accordion accordion-last" id="accordionMain3">
                        <div class="card-header-new" id="headingThree">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    By Status
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample3">
                            <div class="card-body-chat">
                                <div id="checkBoxes2">
                                    <div class="form-custom">
                                        <input type="text" class="form-control" id="member_search2"
                                            placeholder="Search here">
                                        <span><img src="{{ asset('assets/img/icons/search.svg') }}"
                                                alt="img"></span>
                                    </div>
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Active
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="bystatus">
                                            <span class="checkmark"></span> Restricted
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter-buttons">
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">
                            Apply
                        </button>
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-secondary">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('modales.alumno')
    @include('modales.eliminar')
@endsection
@section('js')
    @include('representatives.js')
@endsection
