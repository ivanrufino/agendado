$(document).ready(function () {

    $('#calendar').fullCalendar({
        defaultTimedEventDuration:'01:00:00',
        contentHeight: 'auto',
        
        views: {
            agenda: {
                eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
            }
        },
        editable: false,
        //handleWindowResize: true,
        weekends: true, // Hide weekends
        defaultView: 'agendaDay', // 'listWeek', // Only show week view
        //  header: false, // Hide buttons/titles
        minTime: '07:00:00', // Start time for the calendar
        maxTime: '22:00:00', // End time for the calendar
        /*
         columnFormat: {
         week: 'ddd' // Only show day of the week names
         },*/
        displayEventTime: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,agendaDay,listWeek'
        },
        // defaultDate: '2016-12-12',
        navLinks: true, // can click day/week names to navigate views
        //   editable: true,
        eventLimit: 3, // allow "more" link when too many events
                events: eventos
                /* events: [
                 {
                 title: 'All Day Event',
                 start: '2016-12-01'
                 },
                 {
                 title: 'Long Event',
                 start: '2016-12-07',
                 end: '2016-12-10'
                 },
                 {
                 id: 999,
                 title: 'Repeating Event',
                 start: '2016-12-09T16:00:00'
                 },
                 {
                 id: 999,
                 title: 'Repeating Event',
                 start: '2016-12-16T16:00:00'
                 },
                 {
                 title: 'Conference',
                 start: '2016-12-11',
                 end: '2016-12-13',
                 //  allday:false
                 },
                 {
                 title: 'Meeting',
                 start: '2016-12-12T10:30:00',
                 end: '2016-12-12T12:30:00'
                 },
                 {
                 title: 'Lunch',
                 start: '2016-12-12T12:00:00'
                 },
                 {
                 title: 'Meeting',
                 start: '2016-12-12T14:30:00'
                 },
                 {
                 title: 'Happy Hour',
                 start: '2016-12-12T17:30:00'
                 },
                 {
                 title: 'Dinner',
                 start: '2016-12-12T20:00:00'
                 },
                 {
                 title: 'Birthday Party',
                 start: '2016-12-13T07:00:00'
                 },
                 {
                 title: 'Click for Google',
                 url: 'http://google.com/',
                 start: '2016-12-28'
                 },
                 {
                 title: 'fora do horario',
                 url: 'http://google.com/',
                 start: '2016-12-28T05:00:00'
                 },
                 {
                 title: 'This is a Material Design event!',
                 start: '2016-12-28T08:00:00',
                 end: '2016-12-28T09:30:00',
                 color: '#C2185B'
                 }
                 ], */

    });

});

