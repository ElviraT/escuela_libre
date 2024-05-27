<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/jquery.fullcalendar.js') }}"></script>
<script>
    $('#calendar').fullCalendar({
        // put your options and callbacks here
        left: 'title',
        center: '',
        right: 'prev,next',
        weekends: false,
        weekNumbers: true,
        defaultView: 'day',

    });
</script>
