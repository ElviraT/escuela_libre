@extends('layouts.admin.base')

@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Shedules - Teachers')</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="input-block mb-3">
                                <label>@lang('Teacher')</label>
                                <select class="form-control form-small select" name="combo_teacher" id="combo_teacher">
                                    <option>@lang('Select teachers')</option>
                                    @foreach ($teachers as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-3" id="horario" hidden>
        <div class="page-header">
            <div class="content-page-header">
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a href="#" class="btn btn-primary" data-bs-action="{{ route('shedules.class') }}"
                                data-bs-toggle="modal" data-bs-target="#add_event">@lang('Create Event')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('shedules.teacher.js')
@endsection
@section('modal')
    @include('modales.event')
@endsection
