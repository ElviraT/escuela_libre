<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/fullcalendar/jquery.fullcalendar.js') }}"></script> --}}
<script>
    $("#combo_teacher").on('select2:select', function(event) {
        var id = $(this).val();
        $.getJSON('../teacher-time/' + id, function(objch) {
            var array_businessHours = [];
            var hora_minima = '00:00:00';
            var hora_maxima = '11:59:59';
            var array_dias = [];
            var day = 0;
            loading_show();
            for (i = 0; i <= 6; i++) {
                if (objch[i] === null || objch[i] === undefined || objch[i].length === 0) {
                    array_dias.push(i);
                } else {
                    array_businessHours.push({
                        daysOfWeek: [objch[i].id_day],
                        startTime: objch[i].start_hour,
                        endTime: objch[i].end_hour
                    });
                    hora_minima = objch[i].start_hour;
                    hora_maxima = objch[i].end_hour;
                }
            }
            $('#horario').attr('hidden', false);
            ! function($) {
                "use strict";

                var CalendarApp = function() {
                    this.$body = $("body")
                    this.$calendar = $('#calendar'),
                        this.$event = ('-events div.calendar-events'),
                        this.$categoryForm = $('#add_new_event form'),
                        this.$extEvents = $('#calendar-events'),
                        this.$modal = $('#my_event'),
                        this.$saveCategoryBtn = $('.save-category'),
                        this.$calendarObj = null
                };

                /* on click on event */
                CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) {
                        var $this = this;
                        var form = $("<form></form>");
                        form.append("<label>Change event name</label>");
                        form.append(
                            "<div class='input-group'><input class='form-control' type=text value='" +
                            calEvent.title +
                            "' /><span class='input-group-addon'><button type='submit' class='btn btn-success'><i class='fas fa-check'></i> Save</button></span></div>"
                        );
                        $this.$modal.modal({
                            backdrop: 'static'
                        });
                        $this.$modal.find('.delete-event').show().end().find(
                                '.save-event').hide().end()
                            .find(
                                '.modal-body')
                            .empty().prepend(form).end().find('.delete-event').unbind(
                                'click').click(
                                function() {
                                    $this.$calendarObj.fullCalendar('removeEvents',
                                        function(ev) {
                                            return (ev._id == calEvent._id);
                                        });
                                    $this.$modal.modal('hide');
                                });
                        $this.$modal.find('form').on('submit', function() {
                            calEvent.title = form.find("input[type=text]")
                                .val();
                            $this.$calendarObj.fullCalendar('updateEvent',
                                calEvent);
                            $this.$modal.modal('hide');
                            return false;
                        });
                    },
                    /* on select */
                    CalendarApp.prototype.onSelect = function(start, end, allDay) {
                        var $this = this;
                        $this.$modal.modal({
                            backdrop: 'static'
                        });
                        var form = $("<form></form>");
                        form.append("<div class='event-inputs'></div>");
                        form.find(".event-inputs")
                            .append(
                                "<div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div>"
                            )
                            .append(
                                "<div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div>"
                            )
                            .find("select[name='category']")
                            .append("<option value='bg-danger'>Danger</option>")
                            .append("<option value='bg-success'>Success</option>")
                            .append("<option value='bg-purple'>Purple</option>")
                            .append("<option value='bg-primary'>Primary</option>")
                            .append("<option value='bg-info'>Info</option>")
                            .append(
                                "<option value='bg-warning'>Warning</option></div></div>"
                            );
                        $this.$modal.find('.delete-event').hide().end().find(
                                '.save-event').show().end()
                            .find(
                                '.modal-body')
                            .empty().prepend(form).end().find('.save-event').unbind(
                                'click').click(
                                function() {
                                    form.submit();
                                });
                        $this.$modal.find('form').on('submit', function() {
                            var title = form.find("input[name='title']").val();
                            var beginning = form.find("input[name='beginning']")
                                .val();
                            var ending = form.find("input[name='ending']")
                                .val();
                            var categoryClass = form.find(
                                    "select[name='category'] option:checked")
                                .val();
                            if (title !== null && title.length != 0) {
                                $this.$calendarObj.fullCalendar('renderEvent', {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: false,
                                    className: categoryClass
                                }, true);
                                $this.$modal.modal('hide');
                            } else {
                                alert('You have to give a title to your event');
                            }
                            return false;

                        });
                        $this.$calendarObj.fullCalendar('unselect');
                    },
                    CalendarApp.prototype.enableDrag = function() {
                        //init events
                        $(this.$event).each(function() {
                            // it doesn't need to have a start or end
                            var eventObject = {
                                title: $.trim($(this)
                                    .text()
                                ) // use the element's text as the event title
                            };
                            // store the Event Object in the DOM element so we can get to it later
                            $(this).data('eventObject', eventObject);
                            // make the event draggable using jQuery UI
                            $(this).draggable({
                                zIndex: 999,
                                revert: true, // will cause the event to go back to its
                                revertDuration: 0 //  original position after the drag
                            });
                        });
                    }
                /* Initializing */
                CalendarApp.prototype.init = function() {
                        this.enableDrag();
                        /*  Initialize the calendar  */
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

                        var $this = this;
                        $this.$calendarObj = $this.$calendar.fullCalendar({
                            locale: 'es',
                            slotDuration: '00:15:00',
                            /* If we want to split day time each 15minutes */
                            defaultView: 'agendaWeek',
                            hiddenDays: array_dias,
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
                                $this.onSelect(start, end, allDay);
                            },
                            eventClick: function(calEvent, jsEvent, view) {
                                $this.onEventClick(calEvent, jsEvent, view);
                            }

                        });
                        loading_hide();
                        //on new event
                        this.$saveCategoryBtn.on('click', function() {
                            var categoryName = $this.$categoryForm.find(
                                    "input[name='category-name']")
                                .val();
                            var categoryColor = $this.$categoryForm.find(
                                    "select[name='category-color']")
                                .val();
                            if (categoryName !== null && categoryName.length !=
                                0) {
                                $this.$extEvents.append(
                                    '<div class="calendar-events" data-class="bg-' +
                                    categoryColor +
                                    '" style="position: relative;"><i class="fas fa-circle text-' +
                                    categoryColor +
                                    '"></i>' + categoryName + '</div>')
                                $this.enableDrag();
                            }

                        });
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
</script>
