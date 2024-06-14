<script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
<script src="{{ asset('js/index.global.js') }}"></script>
<script>
    $("#combo_student").on('select2:select', function(event) {
        loading_show();
        // CONSULTAR EVENTOS 

        var id = $(this).val();
        // // listar eventos cargados
        var url = "{{ route('shedules.mostrar.student', ':id') }}";
        url = url.replace(':id', id);
        var array_evento = []
        $.getJSON(url, function(event) {
            for (const ev of event) {
                const clase2 = {
                    'id': ev.id,
                    'title': ev.title,
                    'startTime': ev.startime,
                    'endTime': ev.endtime,
                    'daysOfWeek': [ev.id_day],
                    'freq': ev.freq, //semanal
                    'interval': ev.interval, // intervalo en este ejemplo cada semana
                    'startRecur': ev.startRecur, // Fecha de inicio de la recurrencia
                    'endRecur': ev.endRecur, // Fecha de finalización de la recurrencia
                    'color': ev.color, // Fecha de finalización de la recurrencia

                }
                array_evento.push(clase2);
            }


            // FIN EVENTOS
            $('#horario').attr('hidden', false);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                allDayDefault: false,
                locale: 'es',
                timeZone: 'América/Santiago',
                events: array_evento,
                initialView: 'timeGridWeek',
                hiddenDays: [0, 6],
                droppable: false,
                timeZoneName: 'short',

                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                },
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: ''
                },
                editable: false,

            });
            loading_hide();
            calendar.render();
        });
    });
</script>
