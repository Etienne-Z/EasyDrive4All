@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>How to Use Fullcalendar in Laravel 8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>
  
<div class="container">
    <div id="calendar"></div>
</div>
   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/calender',
        selectable:true,
        selectHelper: true,
        select:function(starting_time, finishing_time)
        {
            var title = prompt('Event Title:');

            if(title)
            {
                var start = $.fullCalendar.formatDate(starting_time, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(finishing_time, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/calender/action",
                    type:"POST",
                    data:{
                        User_ID: User_ID,
    				    Instructor_ID: Instructor_ID,
    				    pickup_address:pickup_address,
                        pickup_city:pickup_city,
                        starting_time:starting_time,
                        finishing_time:finishing_time,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Les succesvol aangemaakt");
                    }
                })
            }
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    User_ID: User_ID,
    				Instructor_ID: Instructor_ID,
    				pickup_address:pickup_address,
                    pickup_city:pickup_city,
                    starting_time:starting_time,
                    finishing_time:finishing_time,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Les succesvol aangepast");
                }
            })
        },
        eventDrop: function(lesson, delta)
        {
            var start = $.fullCalendar.formatDate(lesson.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(lesson.end, 'Y-MM-DD HH:mm:ss');
            var title = lesson.title;
            var id = lesson.id;
            $.ajax({
                url:"/calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Les succesvol aangepast");
                }
            })
        },

        eventClick:function(lesson)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = lesson.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Les succesvol verwijderd");
                    }
                })
            }
        }
    });

});
  
</script>
  
</body>
</html>

@endsection
