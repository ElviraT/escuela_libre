@extends('base_web.header')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Quiénes Somos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Quiénes Somos</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('home/img/about-1.jpg') }}" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Forma Educativa</span></p>
                    <h1 class="mb-4">Atrévete a cambiar a una nueva forma de educación.
                    </h1>
                    <p>En Educación IA, te invitamos al nuevo mundo de la educación online en Chile. Nuestro enfoque
                        innovador proporciona una preparación integral para los exámenes libres, asegurando que cada
                        estudiante esté listo para enfrentar y superar estos desafíos académicos. Pero no nos detenemos
                        ahí. Entendemos que el futuro exige más que conocimientos tradicionales. Por eso, fomentamos
                        habilidades esenciales en emprendimiento e inteligencia artificial, preparando a nuestros
                        estudiantes para los desafíos del mañana. </p>
                    <p>Únete a nosotros y sé parte de una nueva forma de educación. </p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>EXÁMENES LIBRES</h4>
                            <p class="m-0">Nos aseguramos que nuestros estudiantes tendrán los conocimientos y
                                habilidades necesarios para aprobar los exámenes de acuerdo a lo propuesto en el
                                Currículum Nacional, y certificar sus estudios..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>ESPACIO SEGURO:</h4>
                            <p class="m-0">Ofrecemos un ambiente de aprendizaje seguro y libre de bullying, donde los
                                estudiantes se sientan aceptados y respetados. Promovemos el buen trato y educamos en
                                torno a ello..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>FLEXIBILIDAD:</h4>
                            <p class="m-0">Jornada de clases durante las mañanas, que permite a los estudiantes
                                compatibilizar sus estudios con otras actividades: deportivas, culturales, artísticas,
                                personales, etc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>FORMACIÓN PARA EL FUTURO</h4>
                            <p class="m-0">Dentro del plan de clases se incluye la asignatura de Emprendimiento e
                                Inteligencia Artificial, para preparar a los estudiantes para la vida actual y los
                                desafíos futuros..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>CONTINUIDAD DE ESTUDIOS</h4>
                            <p class="m-0">Si eres mayor de 18 años puedes terminar tus estudios seleccionando el
                                plan que más se acomode a tus necesidades de reforzamiento y disposición de tiempo..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>PROFESORES CON VOCACIÓN</h4>
                            <p class="m-0">entregamos las condiciones necesarias para que los profesores disfruten
                                haciendo lo que más les gusta: educar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->
@endsection
