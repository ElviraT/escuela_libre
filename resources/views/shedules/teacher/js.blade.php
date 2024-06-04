<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/fullcalendar/jquery.fullcalendar.js') }}"></script> --}}
<script>
    $("#combo_teacher").on('select2:select', function(event) {
        var id = $(this).val();
        $.getJSON('../teacher-time/' + id, function(objch) {
            var array_businessHours = [];
            var hora_minima = '07:00:00';
            var hora_maxima = '06:59:59';
            var day_laborable = []
            loading_show();
            for (const registro of objch) {
                day_laborable.push(registro.id_day);
                const dia = {
                    dow: registro.id_day,
                    start: registro.start_hour,
                    end: registro.end_hour
                };
                array_businessHours.push(dia);
            }

            const day = [0, 1, 2, 3, 4, 5, 6];
            const noLaborable = compareArrays(day, day_laborable);
            $('#horario').attr('hidden', false);
            ! function($) {
                "use strict";

                var CalendarApp = function() {
                    this.$body = $("body")
                    this.$calendar = $('#calendar'),
                        this.$extEvents = $('#calendar-events'),
                        this.$modal = $('#my_event'),
                        this.$calendarObj = null
                };

                /* Initializing */
                CalendarApp.prototype.init = function() {
                        // this.enableDrag();
                        /*  Initialize the calendar  */
                        var $this = this;
                        var date = new Date();
                        var d = date.getDate();
                        var m = date.getMonth();
                        var y = date.getFullYear();
                        var form = '';
                        var today = new Date($.now());
                        // var defaultEvents = [{
                        //     title: 'Event Name 4',
                        //     start: new Date($.now() + 148000000),
                        //     className: 'bg-purple'
                        // }];


                        $this.$calendarObj = $this.$calendar.fullCalendar({
                            timeZone: 'América/Santiago',
                            defaultView: 'agendaWeek',
                            hiddenDays: noLaborable,
                            businessHours: array_businessHours,
                            handleWindowResize: true,

                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay'
                            },
                            // events: defaultEvents,
                            editable: true,
                            droppable: false, // this allows things to be dropped onto the calendar !!!
                            eventLimit: true, // allow "more" link when too many events
                            selectable: true,
                            // drop: function(date) {
                            //     $this.onDrop($(this), date);
                            // },
                            select: function(start, end, allDay) {
                                // $this.onSelect(start, end, allDay);
                            },
                            eventClick: function(calEvent, jsEvent, view) {
                                // $this.onEventClick(calEvent, jsEvent, view);
                            }

                        });
                        loading_hide();
                    },

                    //init CalendarApp
                    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor =
                    CalendarApp

            }(window.jQuery),

            //initializing CalendarApp
            function($) {
                "use strict";
                $.CalendarApp.init()
            }(window.jQuery);
        });
    });

    function compareArrays(array1, array2) {
        // Create a set from each array to efficiently check for unique values
        const set1 = new Set(array1);
        const set2 = new Set(array2);

        // Find values unique to both arrays
        const intersection = new Set([...array1].filter(x => set2.has(x)));

        // Find values that don't match in either array
        const differences = [...array1].filter(x => !intersection.has(x)).concat([...array2]
            .filter(x => !intersection.has(x)));

        // Return the array of mismatched values
        return differences;
    }

    //CONTROL MODAL EVENTS
    $(document).on('show.bs.modal', '#add_event', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        $("#form-enviar").attr('action', data.bsAction);
        $("#method").val('post');
        if (data.bsRecordId != undefined) {
            $('.title').text("@lang('Edit Class')");
            $('.modal_registro_event_id', modal).val(data.bsRecordId);
            $.getJSON('../teachers/' + data.bsRecordId + '/edit', function(data) {
                var obj = data;

            });
        } else {
            $('.title').text("@lang('Add Class')");
            var teacher = $('#combo_teacher').val();
            $.getJSON('../consulta/' + teacher, function(data) {
                console.log(data);
                $('#id_teacher').val(teacher);
                var html = "";
                html += '<option>Seleccione un Día</option>';
                $.each(data, function(index, value) {
                    html += '<option value="' + value.id + '">' + value.name +
                        "</option>";
                });
                $("#id_day").html(html);
            });
        }
    });
    $(document).on('hidden.bs.modal', '#add_event', function(e) {
        $('#idSex').val('').trigger('change.select2');
        $('#idMaritalState').val('').trigger('change.select2');
        $('#idStatus').val('').trigger('change.select2');
        $('#id_user').val('').trigger('change.select2');
        $("#method").val('post');
        $('#register').val('');
        $('#ncolegio').val('');
    });
    $(document).ready(function() {
        $("#id_day").on('select2:select', function(event) {
            var day = $(this).val();
            var teacher = $('#combo_teacher').val();
            // Enviar una solicitud AJAX para recuperar las subcategorías relacionadas
            $.ajax({
                url: './consulta2/' + day + '/' + teacher,
                method: "GET",
                success: function(data) {
                    var mensaje = 'Las horas disponibles para este día son de ' + data
                        .start_hour + ' a ' + data.end_hour;
                    $('#horas').html(mensaje);
                    $('#startime').attr('disabled', false);
                    $('#endtime').attr('disabled', false);

                    // Definir el rango de horas válido
                    var horaInicio = parseInt(data.start_hour.replace(':', '')) * 3600;
                    var horaFin = parseInt(data.end_hour.replace(':', '')) * 3600;

                    // Obtener el input time y su valor
                    var inputTime = $("#startime");
                    var inputTime1 = $("#endtime");
                    var horaInput;
                    // Función de validación
                    function validarHora() {
                        horaInput = parseInt(inputTime.val().replace(':', '')) * 3600;
                        if (horaInput >= horaInicio && horaInput <= horaFin) {
                            console.log("Hora válida");
                            $('#mensaje').attr('hidden', true);
                        } else {
                            inputTime.val('');
                            $('#mensaje').attr('hidden', false);
                            $('#mensaje').html("Hora no válida");
                        }
                    }
                    // Función de validación
                    function validarHora2() {
                        horaInput = parseInt(inputTime1.val().replace(':', '')) * 3600;
                        if (horaInput >= horaInicio && horaInput <= horaFin) {
                            console.log("Hora válida");
                            $('#mensaje').attr('hidden', true);
                        } else {
                            inputTime1.val('');
                            $('#mensaje').attr('hidden', false);
                            $('#mensaje').html("Hora no válida");
                        }
                    }

                    // Asociar la validación al evento change del input time
                    inputTime.change(validarHora);
                    inputTime1.change(validarHora2);
                },
                error: function() {
                    alert("error")
                }
            });
        });
    })

    $(document).ready(function() {
        $("#id_matter").on('select2:select', function(event) {
            var matter = $(this).val();
            // Enviar una solicitud AJAX para recuperar las subcategorías relacionadas
            $.ajax({
                url: './title/' + matter,
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var title = data.Materia + ' - ' + data.Grupo
                    $('#title').val(title);
                },
                error: function() {
                    alert("error")
                }
            });
        });
    })
</script>
