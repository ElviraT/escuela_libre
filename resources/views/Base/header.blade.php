<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($setting) ? $setting->name : env('APP_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset(isset($setting) ? Storage::url('logos/' . Session::get('favicon')) : 'home/img/favicon.ico') }}"
        rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{ asset('home/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    <style>
        .imgRedonda {
            width: 400px;
            height: 400px;
            border-radius: 160px;
            border: 10px solid #838e9b;

            -webkit-box-shadow: 10px 10px 5px 0px rgba(199, 199, 199, 0.74);
            -moz-box-shadow: 10px 10px 5px 0px rgba(199, 199, 199, 0.74);
            box-shadow: 10px 10px 5px 0px rgba(199, 199, 199, 0.74);
        }

        body::-webkit-scrollbar {
            width: 15px;
            /* width of the entire scrollbar */
        }

        body::-webkit-scrollbar-track {
            background: #00394f;
            /* color of the tracking area */
        }

        body::-webkit-scrollbar-thumb {
            background-color: #17a2b8;
            /* color of the scroll thumb */
            border-radius: 20px;
            /* roundness of the scroll thumb */
            border: 3px solid #00394f;
            /* creates padding around scroll thumb */
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow"
        style="position: fixed !important; width:100%; z-index:100; background-color: white; top: 0;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="#" class="navbar-brand font-weight-bold text-secondary">
                <img src="{{ asset(isset($setting) ? Storage::url('logos/' . Session::get('logo')) : '') }}"
                    alt="Logo" width="15%">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="class.html" class="nav-item nav-link">Classes</a>
                    <a href="team.html" class="nav-item nav-link">Teachers</a>
                    <a href="gallery.html" class="nav-item nav-link">Gallery</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-item nav-link">{{ 'Dashboard' }}</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">{{ 'Login' }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link">{{ 'Register' }}</a>
                            @endif
                        @endauth
                    @endif
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary px-4">Join Class</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    @yield('content')
 <!-- Footer Start -->
 <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0">
                <img src="{{ asset(isset($setting) ? Storage::url('logos/' . Session::get('logo')) : '') }}"
                    alt="Logo" width="90%">
            </a>
            <p>{{ isset($setting) ? $setting->description : '' }}</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="{{ isset($setting) ? $setting->twitter : '#' }}"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="{{ isset($setting) ? $setting->facebook : '#' }}"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px;"
                    href="{{ isset($setting) ? $setting->instagram : '#' }}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Get In Touch</h3>
            <div class="d-flex">
                <h4 class="fa fa-map-marker-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">@lang('Address')</h5>
                    <p>{{ isset($setting) ? $setting->address : '' }}</p>
                    <p>{{ isset($setting) ? $setting->address2 : '' }}</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-envelope text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">@lang('Email')</h5>
                    <p>{{ isset($setting) ? $setting->email : '' }}</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-phone-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">@lang('Phone')</h5>
                    <p>{{ isset($setting) ? $setting->phone : '' }}</p>
                    <p>{{ isset($setting) ? $setting->phone2 : '' }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Quick Links</h3>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
                <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Blog</a>
                <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Newsletter</h3>
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                        required="required" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                        required="required" />
                </div>
                <div>
                    <button class="btn btn-primary btn-block border-0 py-3" type="submit">Submit Now</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-primary font-weight-bold" href="#">Escuela Libre</a>. @lang('All Rights Reserved').
            @lang('Designed by')
            <a class="text-primary font-weight-bold" href="#">Ing. Elvira Terán</a>
        </p>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('home/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('home/lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('home/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('home/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('home/js/main.js') }}"></script>
</body>

</html>