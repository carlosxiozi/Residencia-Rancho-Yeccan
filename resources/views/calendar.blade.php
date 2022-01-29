<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
    <title>Document</title>
</head>
<script>
    fetch("/calendar").then((response,reject) =>{
        if (response){
                console.log(response)
            }
        else{
            Console.log(reject)
        }
    }).catch(console.log)




    document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale: "es",

        headerToolbar: {
            left: 'prev,next today',
            center: 'title'
        },
        events: [
            /*@php
                foreach($eventos1 as $eventos){
            @endphp
                title: "@php echo $eventos["nombre_evento"]; @endphp",
                start: "@php echo $eventos["fecha_inicial"]; @endphp",
                end: "@php echo $eventos["fecha_final"]; @endphp"
            @php
                }
            @endphp*/
            /*{
                title: "Mi evento 1",
                start: "2022-01-24 00:00:00",
                end: "2022-01-27 00:00:00"
            }*/
        ]
        });
    calendar.render(); 
    });
</script>
<body>
    <div class="container">
        <div id="agenda"></div>
    </div>  
</body>
</html>