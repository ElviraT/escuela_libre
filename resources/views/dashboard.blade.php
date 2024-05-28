@extends('layouts.admin.base')
@section('content')
    @include('layouts.admin.barra_superior')
@endsection
@section('js')
    <script>
        const intro = introJs().setOptions({
            steps: [{
                    title: 'Bienvenido',
                    intro: 'Bienvenido al sistema Escuela Libre Chile'
                },
                {
                    title: "Barra informativa",
                    element: document.querySelector('.first'),
                    intro: 'Muestra información para acceso rápido'
                },
                {
                    title: "Menu",
                    element: document.querySelector('.second'),
                    intro: 'Panel de navegación del sistema'
                }
            ],
        });

        document.getElementById('iniciarIntroBtn').addEventListener('click', () => {
            intro.start();
        });

        introJs().addHints();
    </script>
@endsection
