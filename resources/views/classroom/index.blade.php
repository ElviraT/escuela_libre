@extends('layouts.admin.base')
@section('content')
    <div class="card p-3">
        <div class="page-header">
            <div class="content-page-header">
                <h5>@lang('Class Room')</h5>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <div id="meet"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src='https://meet.jit.si/external_api.js'></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: 'Grado-Sección',
            width: 700,
            height: 700,
            parentNode: document.querySelector('#meet'),
            lang: 'es',

            userInfo: {
                email: '{{ auth()->user()->email }}',
                displayName: '{{ auth()->user()->name }}'
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);

        $('.hangup-button').click(function() {
            window.load();
        });
    </script>
@endsection
