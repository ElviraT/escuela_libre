@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Report Ratings')</h5>
                        <div class="list-btn">
                            <ul class="filter-list">
                                <li>
                                    <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="@lang('Download')">
                                        <a class="d-flex align-items-center download-item"
                                            href="{{ route('pdf.student', $idStudent) }}"><i
                                                class="far fa-file-pdf me-2"></i>PDF</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">
                                    <form action="{{ route('report.student') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Students')</label>
                                                    <select class="form-control form-small select" name="combo_student"
                                                        id="combo_student">
                                                        <option>@lang('Select students')</option>
                                                        @foreach ($students as $value)
                                                            <option
                                                                value="{{ $value->id }}"{{ $idStudent == $value->id ? 'selected' : '' }}>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                                <button type="submit" class="btn btn-primary mt-1"><i
                                                        class="fa fa-search"></i>&nbsp;@lang('Search')</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($idStudent != '')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-table">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-center table-hover datatable border"
                                                                width="100%">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>@lang('Matter')</th>
                                                                        <th>@lang('Rating')</th>
                                                                        <th>@lang('Absence')</th>
                                                                        <th>@lang('Comment')</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($ratings as $item)
                                                                        <tr>
                                                                            <td>{{ $item->matter->name }}</td>
                                                                            <td>
                                                                                @if ($item->rating < 5)
                                                                                    <strong
                                                                                        style="color: crimson">{{ $item->rating }}</strong>
                                                                                @else
                                                                                    <span>{{ $item->rating }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ $item->absence }}</td>
                                                                            <td>{{ $item->comment }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th><strong>@lang('Average')</strong></th>
                                                                        <th>{{ $promedioRating }}</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
