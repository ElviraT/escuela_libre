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
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow" style="position: fixed !important; z-index:1; mb-5">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="#" class="navbar-brand font-weight-bold text-secondary">
                <img src="{{ asset(isset($setting) ? Storage::url('logos/' . Session::get('logo')) : '') }}"
                    alt="Logo" width="15%">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
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
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary px-4">Join Class</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <!--<h4 class="text-white mb-4 mt-5 mt-lg-0">Escuela Libre de Educación IA</h4>-->
                <h4 class="display-3 font-weight-bold text-white">Escuela Libre de Educación IA</h4>
                <p class="text-white mb-4">Nuestro proyecto educativo te prepara para los exámenes libres, ofreciendo una educación personalizada y de calidad, en un ambiente seguro, en línea y con horario flexible para compatibilizar con otras actividades. 
                    En nuestra escuela también aprenderás sobre emprendimiento e inteligencia artificial, buscamos fomentar el desarrollo integral y preparar a las y los jóvenes para el futuro que se avecina.
                    .</p>
                <a href="" class="btn btn-secondary mt-1 py-3 px-5">
Escuela Libre de Educación IA
</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="{{ asset('home/img/header.jpg') }}" alt="" width="90%">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>EXÁMENES LIBRES</h4>
                            <p class="m-0">Nos aseguramos que nuestros estudiantes tendrán los conocimientos y habilidades necesarios para aprobar los exámenes de acuerdo a lo propuesto en el Currículum Nacional, y certificar sus estudios..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>ESPACIO SEGURO:</h4>
                            <p class="m-0">Ofrecemos un ambiente de aprendizaje seguro y libre de bullying, donde los estudiantes se sientan aceptados y respetados. Promovemos el buen trato y educamos en torno a ello..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>FLEXIBILIDAD:</h4>
                            <p class="m-0">Jornada de clases durante las mañanas, que permite a los estudiantes compatibilizar sus estudios con otras actividades: deportivas, culturales, artísticas, personales, etc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>FORMACIÓN PARA EL FUTURO</h4>
                            <p class="m-0">Dentro del plan de clases se incluye la asignatura de Emprendimiento e Inteligencia Artificial, para preparar a los estudiantes para la vida actual y los desafíos futuros..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>CONTINUIDAD DE ESTUDIOS</h4>
                            <p class="m-0">Si eres mayor de 18 años puedes terminar tus estudios seleccionando el plan que más se acomode a tus necesidades de reforzamiento y disposición de tiempo..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Educational Tour</h4>
                            <p class="m-0">entregamos las condiciones necesarias para que los profesores disfruten haciendo lo que más les gusta: educar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('home/img/about-1.jpg') }}"
                        alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Forma Educativa</span></p>
                    <h1 class="mb-4">Atrévete a cambiar a una nueva forma de educación.
                    </h1>
                    <!<p>En Educación IA, te invitamos al nuevo mundo de la educación online en Chile. Nuestro enfoque innovador proporciona una preparación integral para los exámenes libres, asegurando que cada estudiante esté listo para enfrentar y superar estos desafíos académicos. Pero no nos detenemos ahí. Entendemos que el futuro exige más que conocimientos tradicionales. Por eso, fomentamos habilidades esenciales en emprendimiento e inteligencia artificial, preparando a nuestros estudiantes para los desafíos del mañana. </p>
                    <p>Únete a nosotros y sé parte de una nueva forma de educación. </p>
                    <div class="row pt-2 pb-4">
                        <!--<div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="{{ asset('home/img/about-2.jpg') }}" alt="">
                        </div>-->
                        
                        <!--<div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Etsea et
                                    sit dolor amet ipsum</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Diam dolor
                                    diam elitripsum vero.</li>
                                    <li class="py-2 border-top border-bottom"><i
                                        class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Etsea et
                                    sit dolor amet ipsum</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Diam dolor
                                    diam elitripsum vero.</li>
                            </ul>
                        </div>-->
                    </div>
                <!-- <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>-->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
     <!-- Start ¿CÓMO SON NUESTRAS CLASES? -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <!--<p class="section-title pr-5"><span class="pr-2">Learn About Us</span></p>-->
                    <h1 class="mb-4">¿CÓMO SON NUESTRAS CLASES?.</h1>
                    <!--<p>En Educación IA, te invitamos al nuevo mundo de la educación online en Chile. Nuestro enfoque innovador proporciona una preparación integral para los exámenes libres, asegurando que cada estudiante esté listo para enfrentar y superar estos desafíos académicos. Pero no nos detenemos ahí. Entendemos que el futuro exige más que conocimientos tradicionales. Por eso, fomentamos habilidades esenciales en emprendimiento e inteligencia artificial, preparando a nuestros estudiantes para los desafíos del mañana. </p>-->
                    <!--<p>Únete a nosotros y sé parte de una nueva forma de educación. </p>-->
                    <!--<div class="row pt-2 pb-4">-->
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa fa-check text-primary mr-3"></i>Clases sincrónicas de acuerdo al horario de cada nivel, a través de plataforma (meet ?)</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Acceso a plataforma con material de clases y actividades disponible 24/7 (gdrive?)</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Sistema de calificaciones e informes para seguimiento académico</li>
                                    <li class="py-2 border-top border-bottom"><i
                                        class="fa fa-check text-primary mr-3"></i>Evaluación diagnóstica, acompañamiento y dos ensayos de examen libre</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Las asignaturas que contempla el plan de estudio es de 5° a 2° medio:lenguaje y comunicación, matemática, historia y ciencias sociales, ciencias naturales e inglés. </li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Las asignaturas que contempla el plan de estudio de 3° y 4° medio: lengua y literatura, matemática, filosofía, ciencia para la ciudadanía, educación ciudadana e inglés..</li>
                            </ul>
                    <!--<a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>-->
                </div>
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('home/img/pc-1.jpg') }}"
                        alt="">
                </div>
            </div>
            
        </div>
    </div>
    <!--¿CÓMO SON NUESTRAS CLASES? End -->


    <!-- Class Start -->
    <!--<div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Popular Classes</span></p>
                <h1 class="mb-4">¿CÓMO SON NUESTRAS CLASES?</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/class-1.jpg') }}" alt="">
                        <div class="card-body text-center">
                            <!--<h4 class="card-title">Drawing Class</h4>
                            <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum duo
                                et no et, ipsum ipsum erat duo amet clita duo</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                <div class="col-6 py-1">3 - 6 Years</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                <div class="col-6 py-1">40 Seats</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Tution Fee</strong></div>
                                <div class="col-6 py-1">$290 / Month</div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/class-2.jpg') }}" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Language Learning</h4>
                            <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum duo
                                et no et, ipsum ipsum erat duo amet clita duo</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                <div class="col-6 py-1">3 - 6 Years</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                <div class="col-6 py-1">40 Seats</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Tution Fee</strong></div>
                                <div class="col-6 py-1">$290 / Month</div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/class-3.jpg') }}" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Basic Science</h4>
                            <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum duo
                                et no et, ipsum ipsum erat duo amet clita duo</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                <div class="col-6 py-1">3 - 6 Years</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                <div class="col-6 py-1">40 Seats</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Tution Fee</strong></div>
                                <div class="col-6 py-1">$290 / Month</div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Class End -->


    <!-- Registration Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5"><span class="pr-2">Book A Seat</span></p>
                    <h1 class="mb-4">¿Quieres unirte a una nueva educación?</h1>
                    <p>Contáctanos para hacernos tus preguntas o reservar un cupo para la matrícula 2025. Con nosotros ganarás:</p>
                    <ul class="list-inline m-0">
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Tranquilidad, tiempo y seguridad para el aprendizaje de tus hijos.</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Tus hijos tendrán herramientas para el futuro en el que nos adentramos.
                        </li>
                        <!--<li class="py-2"><i class="fa fa-check text-success mr-3"></i>Diam dolor diam elitripsum
                            vero.</li>-->
                    </ul>
                    <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Únete a nueva educación</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;">
                                        <option selected>Select A Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 1</option>
                                        <option value="3">Class 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">Book
                                        Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->


    <!-- Team Start -->
    <!--<div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{ asset('home/img/team-1.jpg') }}" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Julia Smith</h4>
                    <i>Music Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{ asset('home/img/team-2.jpg') }}" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Jhon Doe</h4>
                    <i>Language Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{ asset('home/img/team-3.jpg') }}" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Mollie Ross</h4>
                    <i>Dance Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{ asset('home/img/team-4.jpg') }}" alt="">
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Donald John</h4>
                    <i>Art Teacher</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <!--<div class="container-fluid py-5">
        <div class="container p-0">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Testimonial</span></p>
                <h1 class="mb-4">What Parents Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor
                        ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('home/img/testimonial-1.jpg') }}"
                            style="width: 70px; height: 70px;" alt="Image">
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor
                        ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('home/img/testimonial-2.jpg') }}"
                            style="width: 70px; height: 70px;" alt="Image">
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor
                        ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('home/img/testimonial-3.jpg') }}"
                            style="width: 70px; height: 70px;" alt="Image">
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor
                        ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('home/img/testimonial-4.jpg') }}"
                            style="width: 70px; height: 70px;" alt="Image">
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start 
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Latest Blog</span></p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/blog-1.jpg') }}" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam eirmod, duo et sed sit eirmod
                                kasd clita tempor dolor stet lorem. Tempor ipsum justo amet stet...</p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/blog-2.jpg') }}" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam eirmod, duo et sed sit eirmod
                                kasd clita tempor dolor stet lorem. Tempor ipsum justo amet stet...</p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{ asset('home/img/blog-3.jpg') }}" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam eirmod, duo et sed sit eirmod
                                kasd clita tempor dolor stet lorem. Tempor ipsum justo amet stet...</p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


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
