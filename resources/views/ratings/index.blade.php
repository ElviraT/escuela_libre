@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Ratings')</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Teacher')</label>
                                                <select class="form-control form-small select" name="combo_teacher"
                                                    id="combo_teacher">
                                                    <option>@lang('Select teachers')</option>
                                                    @foreach ($teachers as $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ Auth::user()->id == $value->user ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Grade')</label>
                                                <select class="form-control form-small select" name="combo_grade"
                                                    id="combo_grade">
                                                    <option>@lang('Select grade')</option>
                                                    @foreach ($grades as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Group')</label>
                                                <select class="form-control form-small select" name="combo_group"
                                                    id="combo_group" disabled>
                                                    <option>@lang('Select group')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Matters')</label>
                                                <select class="form-control form-small select" name="combo_matter"
                                                    id="combo_matter" disabled>
                                                    <option>@lang('Select matter')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <button class="btn btn-primary mt-1" onclick="cargar_tabla()"><i
                                                    class="fa fa-search"></i>&nbsp;@lang('Search')</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div id="table-container"></div>
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
        @include('modales.rating')
        {{--  @include('modales.eliminar') --}}
    @endsection
    @section('js')
        @include('ratings.js')
    @endsection
