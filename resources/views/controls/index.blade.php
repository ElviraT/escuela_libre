@extends('layouts.admin.base')

@section('content')
    <div class="row">
        @include('controls.menu')
        <div class="col-xl-9 col-md-8">
            <div class="card">
                <img src="{{ asset('assets/img/control-de-estudio.jpg') }}" alt="">
            </div>
        </div>
    </div>
@endsection
