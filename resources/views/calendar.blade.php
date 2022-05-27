@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='calendar'></div>

    </div>
@endsection

@push('js')
    <script>


        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'ar';
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: initialLocaleCode,
            buttonIcons: true, // show the prev/next text
            weekNumbers: false,
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                {
                title: 'My Event',
                start: '2022-05-05 10:30:00',
                end: '2022-05-05 22:30:00',
                color: 'green',
                backgroundColor :'green',
                url: 'http://google.com/'
                }
                // other events here
            ],
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate

                if (info.event.url) {
                    window.open(info.event.url);
                }
            }
            });

            calendar.render();


        });

    </script>
@endpush
