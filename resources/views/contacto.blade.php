@extends('base_web.header')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contactanos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Contactanos</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Póngase en contacto</span></p>
                <h1 class="mb-4">Para Cualquier Consulta</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-2 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="mailto:{{ isset($setting) ? $setting->email : '' }}" method="post" name="sentMessage"
                            id="contactForm" enctype="text/plain">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="@lang('Name')"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="@lang('Email')"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="@lang('Subject')"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="6" id="message" placeholder="@lang('Message')" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit"
                                    id="sendMessageButton">@lang('Send Message')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <p>¿Quieres que tu hijo/a experimente una educación más libre y significativa? En <strong> EDUCACIÓN
                            IA</strong>,
                        promovemos el aprendizaje activo y el desarrollo de habilidades para la vida.
                        ¡Contáctanos para conocer nuestra propuesta educativa!</p>
                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>@lang('Address')</h5>
                            <p>{{ isset($setting) ? $setting->address : '' }}</p>
                            <p>{{ isset($setting) ? $setting->address2 : '' }}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>@lang('Email')</h5>
                            <p>{{ isset($setting) ? $setting->email : '' }}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>@lang('Phone')</h5>
                            <p>{{ isset($setting) ? $setting->phone : '' }}</p>
                            <p>{{ isset($setting) ? $setting->phone2 : '' }}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px;"></i>
                        <div class="pl-3">
                            <h5>@lang('Opening Hours')</h5>
                            <ul>
                                <li>La jornada escolar inicia a las 09:00 de la mañana y termina de 5to a 2° medio a las
                                    12:45 hrs.</li>
                                <li>La jornada escolar para 3° y 4° medio inicia a las 09:00 de la mañana y culmina a las
                                    13:45 hrs.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
