<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Laravel</title>
        <!-- Fonts -->
        <!-- link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" -->
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
        
        <!-- -------------------------------------------------------------------- -->
        <link href="{!! asset('node_modules/@fullcalendar/core/main.min.css') !!}" rel='stylesheet' />
        <link href="{!! asset('node_modules/@fullcalendar/daygrid/main.min.css') !!}" rel='stylesheet' />
        <link href="{!! asset('node_modules/@fullcalendar/timegrid/main.min.css') !!}" rel='stylesheet' />
        
        <script src="{!! asset('node_modules/@fullcalendar/core/main.min.js') !!}"></script>
        <script src="{!! asset('node_modules/@fullcalendar/daygrid/main.min.js') !!}"></script>
        <script src="{!! asset('node_modules/@fullcalendar/timegrid/main.min.js') !!}"></script>

        <script>
            //////////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////////
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid', 'timeGrid', 'list', 'bootstrap' ],
                //timeZone: 'UTC',
                themeSystem: 'bootstrap',
                defaultView: 'dayGridMonth',
                //defaultDate: 'YYYY-MM-DD',
                height: 'parent',
                editable: false,
                eventLimit: false,
                navLinks: true,
                weekNumbers: false,
                weekNumbersWithinDays: false,
                selectable: true,
                nowIndicator: false,
                businessHours: false,
                displayEventTime: false,
                //resourceLabelText: 'Resource Label',
                //aspectRatio: 1.5,
                //groupByResource: false,
                //groupByDateAndResource: false,
                //allDaySlot: false,
                //weekMode: fixed | liquid,
                header: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay,addEventButton',//custom1
                    center: 'title',
                    right: 'prevYear,prev,next,nextYear'//custom2
                },
                footer: {
                    //left: 'custom1,custom2',
                    center: '',
                    right: 'prev,next'
                },
                customButtons: {
                    custom1: {
                        text: 'custom 1',
                        click: function() {
                            alert('clicked custom button 1!');
                        }
                    },
                    custom2: {
                        text: 'custom 2',
                        click: function() {
                            alert('clicked custom button 2!');
                        }
                    },
                    addEventButton: {
                        text: 'add event...',
                        click: function() {
                            var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                            var date = new Date(dateStr + 'T00:00:00'); // will be in local time

                            if (!isNaN(date.valueOf())) { // valid?
                                calendar.addEvent({
                                    title: 'dynamic event',
                                    start: date,
                                    allDay: true
                                });
                                alert('Great. Now, update your database...');
                            } else {
                                alert('Invalid date.');
                            }
                        }
                    }
                },
                eventClick: function(arg){
                    //console.log(arg);
                },
                dateClick: function(info) {
                    //console.log('clicked ' + info.dateStr + ' on resource ' + info.resource.id);
                },
                select: function(info) {
                    //console.log('selected ' + info.startStr + ' to ' + info.endStr + ' on resource ' + info.resource.id);
                },
                eventRender: function(info) {
                    /*var tooltip = new Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });*/
                },
                resourceRender: function(info) {
                    var cellText = info.el.querySelector('.fc-cell-text');
                    var title = info.resource.title;
                },
                //////////////////////////////////////////
                views: {
                    basic: {
                        // options apply to basicWeek and basicDay views
                    },
                    agenda: {
                        // options apply to agendaWeek and agendaDay views
                    },
                    month: {
                        // options apply to basicWeek and agendaWeek views
                        // titleFormat: 'YYYY, MM, DD'
                    },
                    week: {
                        // options apply to basicWeek and agendaWeek views
                    },
                    day: {
                        // options apply to basicDay and agendaDay views
                    }
                },
                //////////////////////////////////////////
                resources: [],
                events: [
                    //{title: 'Conference',start: '2019-05-20',end: '2019-05-22',description: 'description',rendering: 'background',overlap: false},
                    {title: 'Long Event',start: '2019-05-07',end: '2019-05-11',color: 'purple',description: 'description'},
                    {groupId: '999',title: 'Repeating Event',start: '2019-05-09T16:10:00',description: 'description'},
                    {groupId: '999',title: 'Repeating Event',start: '2019-05-16T16:15:00',description: 'description'},
                    {title: 'Click for Google 1',url: 'http://google.com/',start: '2019-05-28',description: 'description'},
                    {title: 'Click for Google 2',url: 'http://google.com/',start: '2019-05-28',description: 'description'},
                    {title: 'Click for Google 3',url: 'http://google.com/',start: '2019-05-28',description: 'description'},
                    {title: 'Click for Google 4',url: 'http://google.com/',start: '2019-05-28',description: 'description'}
                ]
            });

            calendar.render();
        });
        </script>
        <!-- -------------------------------------------------------------------- -->
    </head>
    <body>
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
    </body>
</html>
