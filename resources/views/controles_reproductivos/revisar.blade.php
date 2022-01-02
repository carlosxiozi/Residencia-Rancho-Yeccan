<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <title></title>
</head>
<body>


    <center>
    <div class=titulo>
        <h1> Revisar </h1>
    </div>
    <form action="/controles_reproductivos/{{$reproductivo1->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-ini">
           
           
            <label class="nombre">Anotaciones anteriores:
                @php 
                    $i=1;
                @endphp
                @foreach($expediente as $expediente)
                    @if($expediente=="")
                    
                    @else <br>{{$i++.".-".$expediente}}
                    
                    @endif
                @endforeach
                </label><br><br><br>
            <textarea class="textarea" name="motivo" Onkeyup="charCount();" cols="45" rows="10" placeholder="Escribe las observaciones aqui..." maxlength="500" minlength="3"></textarea><br>
            <button class="regreso">Agregar</button><br><br>

            
            <label class="nombre">¿La vaca ha quedado preñada?" </label><br><br><br>
        </div>
    

    </form>
   
    <form action="/controles_reproductivos/{{$reproductivo1->id}}" method="post" >
    @csrf
        @method('PUT')
        <button class="btn_acep" name="estadoTrue" value="1">Si</button>
        <button class="btn_acep"  name="estadoFalse" value = "0">No</button>
    </form>
    </center>
    
</body>
</html>