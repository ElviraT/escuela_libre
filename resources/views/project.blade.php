@extends('base_web.header')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Proyecto Educativo</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Proyecto Educativo</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Misión y Visión Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>Misión</h2>
                    <p>Empoderar a estudiantes chilenos de todas las edades para alcanzar sus metas académicas a través de
                        una educación flexible, personalizada y de alta calidad, centrada en la preparación exitosa para
                        exámenes libres.</p>
                </div>
                <div class="col-lg-6">
                    <h2>Visión</h2>
                    <p>Ser reconocidos como la principal escuela libre online en Chile, destacando por nuestro compromiso
                        con el éxito de nuestros estudiantes, la excelencia académica y la innovación en la educación a
                        distancia.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Misión y Visión End -->

    {{-- Nuestros valores star --}}
    <div class="container-fluid py-5">
        <div class="container">
            <h2>Nuestros Valores</h2>
            <ul class="list-inline m-0">
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>
                    <strong> Estudiante en el Centro:</strong> Priorizamos las necesidades y el ritmo de aprendizaje de cada
                    estudiante, brindando un acompañamiento personalizado y cercano.
                </li>
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>
                    <strong> Excelencia Académica:</strong> Contamos con profesores altamente calificados y apasionados por
                    la enseñanza, comprometidos con la preparación efectiva para exámenes libres.
                </li>
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>
                    <strong> Flexibilidad e Innovación:</strong> Utilizamos tecnología de vanguardia y metodologías
                    adaptables para ofrecer una experiencia educativa flexible y accesible para todos.
                </li>
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>
                    <strong> Inclusión y Respeto:</strong> Promovemos un ambiente de aprendizaje seguro, diverso e
                    inclusivo, donde todos los estudiantes se sientan valorados y respetados.
                </li>
                <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>
                    <strong> Formación Integral:</strong> Más allá de la preparación para exámenes, fomentamos el desarrollo
                    de habilidades clave para el futuro, como el pensamiento crítico, la creatividad y la autonomía.
                </li>
            </ul>
        </div>

    </div>
    {{-- Nuestros valores end --}}

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <h2>Atributos Distintivos</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">

                        <i class="fas fa-spell-check text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Preparación Efectiva para Exámenes Libres:</h4>
                            <p class="m-0">Nuestro programa se enfoca en desarrollar las habilidades y conocimientos
                                necesarios para aprobar con éxito los exámenes libres, brindando material actualizado,
                                simulacros y retroalimentación constante.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="fas fa-user-shield text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Espacio Seguro y de Apoyo:</h4>
                            <p class="m-0">Creamos un ambiente virtual acogedor y libre de juicios, donde los estudiantes
                                se sienten cómodos para expresarse, preguntar y aprender sin presiones.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="fas fa-user-clock text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Flexibilidad Horaria Total:</h4>
                            <p class="m-0">J Los estudiantes pueden acceder a los contenidos y recursos en cualquier
                                momento y lugar, adaptando su aprendizaje a su propio ritmo y estilo de vida.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="fas fa-chalkboard-teacher text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Profesores con Vocación:</h4>
                            <p class="m-0">Nuestro equipo docente se destaca por su pasión por la enseñanza, su
                                experiencia en exámenes libres y su compromiso con el progreso individual de cada
                                estudiante.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="fas fa-graduation-cap text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Continuidad de Estudios sin Barreras:</h4>
                            <p class="m-0">Facilitamos la reincorporación al sistema educativo, brindando apoyo y
                                orientación para que los estudiantes retomen sus estudios sin obstáculos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="fas fa-user-graduate text-primary mb-3" style="font-size: 38px;"></i>
                        <div class="pl-4">
                            <h4>Formación para el Futuro:</h4>
                            <p class="m-0">Complementamos la preparación académica con el desarrollo de habilidades
                                esenciales para el éxito en el siglo XXI, como la comunicación efectiva, el trabajo en
                                equipo y la resolución de problemas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h1 align="center">
                ¡Únete a nuestra comunidad de aprendizaje y alcanza tus metas académicas con confianza y flexibilidad!
            </h1>
        </div>
    </div>
    <!-- Facilities Start -->
@endsection
