
var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function() {
    // Function to initialize the calendar
    function initializeCalendar() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k];
                var backgroundColor = '#008000'; // default color for present
                var textColor = '#FFFFFF'; // default text color
                if (row.title.toLowerCase() === 'absent') {
                    backgroundColor = '#FF5733'; // red color for absent
                } else if (row.title.toLowerCase() === 'holiday' || isWeekend(row.start_datetime)) {
                    backgroundColor = '#FFFF00'; // yellow color for holiday or weekend
                    textColor = '#000000'; // black text color for yellow background
                }
                events.push({ 
                    id: row.id, 
                    title: row.title, 
                    start: row.start_datetime, 
                    end: row.end_datetime, 
                    backgroundColor: backgroundColor, // set background color based on condition
                    textColor: textColor // set text color based on background color
                });
            });
        }

        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            firstDay: 1,
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal');
                var id = info.event.id;
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].title + " " + scheds[id].start_datetime);
                    _details.find('#clock_in').text("Clock In : " + scheds[id].clockin);
                    _details.find('#clock_out').text("Clock Out : " + scheds[id].clockout);
                    _details.modal('show'); // Open the modal
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true,
           
          
        });

        calendar.render();
         // Get the current view's start date

    }

    // Function to check if a date is a weekend
    function isWeekend(dateString) {
        var date = new Date(dateString);
        var day = date.getDay();
        return day === 0 || day === 6; // 0 for Sunday, 6 for Saturday
    }

    // Initialize the calendar
    initializeCalendar();
});
