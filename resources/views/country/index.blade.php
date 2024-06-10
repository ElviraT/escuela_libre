@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>@lang('Countries')</h5>
                        
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($countries as $item)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                {{ $item->name }}
                                                            </h2>
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
    {{-- @include('modales.country') --}}
    @include('modales.eliminar')
@endsection
{{-- @section('js') --}}
    @include('controls.js')
{{-- @endsection --}}
