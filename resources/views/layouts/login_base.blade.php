<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Kanakku provides clean Admin Templates for managing Sales, Payment, Invoice, Accounts and Expenses in HTML, Bootstrap 5, ReactJs, Angular, VueJs and Laravel.">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Ing. Elvira Terán">
    <title>{{ isset($company) ? $company->name : env('APP_NAME') }}</title>
    <link href="{{ asset(Storage::url('logos/' . Session::get('favicon'))) }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="img js-fullheight"
    style="background-image: url('{{ asset(Storage::url('logos/' . Session::get('logo'))) }}'); 
    background-repeat: no-repeat;
    background-position: center center;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h2 class="heading-section">@lang('Login')</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 p-4" style="background-color: rgb(0, 0, 0); opacity:0.7">
                    <div class="login-wrap p-0">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
