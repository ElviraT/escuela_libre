@extends('layouts.admin.base')
@section('content')
    @include('layouts.admin.barra_superior')
    @if (Auth::user()->hasAnyRole('Admin', 'SuperAdmin'))
        <div class="col-6">
            <div class="card sombra p-3">
                <div class="row">
                    <div class="card-table">
                        <div class="card-body">
                            <h5>@lang('Defaulters Of The Month')</h5>
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>@lang('Representative')</th>
                                            <th Class="no-sort">@lang('Actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($morosos as $item)
                                            <tr>
                                                <td>{{ $item->name . ' ' . $item->last_name }}</td>
                                                <td class="d-flex align-items-center">

                                                    <a href="#" type="button" class="btn btn-greys me-2"
                                                        onclick="recordatorio('{{ $item->id }}')">
                                                        <i class="fa fa-envelope me-1"></i>
                                                        {{ __('Reminder') }}
                                                    </a>

                                                    <a href="#" type="button" class="btn btn-greys me-2"
                                                        data-bs-toggle="modal" data-bs-target="#cambiar_status"
                                                        data-bs-record-id="{{ $item->id }}"
                                                        title="{{ __('Change Status') }}"><i
                                                            class="fa fa-user-times me-2"></i>@lang('Change Status')
                                                    </a>
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
    @endif
@endsection
@section('modal')
    @include('modales.cambiar_status')
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

        function recordatorio(id) {
            $.ajax({
                url: '/reminder/' + id,
                method: "GET",

                success: function(data) {
                    toastr["success"]("¡Operación exitosa!", "Mensaje Enviado");
                },
                error: function() {
                    alert("error")
                }
            });
        }

        $(document).on('show.bs.modal', '#cambiar_status', function(e) {
            var modal = $(e.delegateTarget),
                data = $(e.relatedTarget).data();
            $("#id_status2").select2({
                dropdownParent: "#cambiar_status"
            });
            $('.modal_registro_user_id', modal).val(data.bsRecordId);
            $('.title').text("@lang('Change Status')");
        });
        $(document).on('hidden.bs.modal', '#cambiar_status', function(e) {
            $('#id_status2').val('').trigger('change.select2');
        });
    </script>
@endsection
