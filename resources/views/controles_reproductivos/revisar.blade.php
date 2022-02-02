<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
</head>

<body>


   
        <div class="content_bread">
            <ul class="h3">
    
                <li class="item_selected">Reproductivo > </li>
                <li class="item_selected">Revisar</li>
            </ul>
        </div>
        <center>
        <a class="btn btn-dark" style="font-size: 16px;
        height: 40px;
        width: 60px;"href="/"><span class="fas fa-home"></span>Inicio</a>
        </center>
    <div class="container-fluid mt-5 row  mx:auto">
        <div style="margin-right: 500px; background: white !important"
            class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
            <form action="/controles_reproductivos/{{ $reproductivo1->id }}" method="post"
                enctype="multipart/form-data">

                <div class="row p-2 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <span class="input-group-text">  Observaciónes</span>
                        <textarea  class="form-control" name="motivo" Onkeyup="charCount();" cols="45" rows="10"
                            placeholder="Escribe las observaciones aqui..." maxlength="500"
                            minlength="3"></textarea><br>
                    </div>
                    <button class="btn btn-primary">Agregar</button><br><br>
                    <label class="input-group-text">¿La vaca ha quedado preñada?" </label><br><br>
            </form>


            @if ($ban == 1)
                <form action="/controles_reproductivos/{{ $reproductivo1->id }}" method="post">
                    @csrf
                    @method('PUT')

                    <button class="btn btn-primary" name="estadoTrue" value="1">Si</button>
                    <button class="btn btn-primary" name="estadoFalse" value="0">No</button>
                </form>
            @else
                <label for="">Esto no es posible</label>
            @endif
        </div>
    </div>

    <div style="margin-right: 500px; background: white !important" class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
        <label class="input-group-text">Anotaciones anteriores:</label>

        @php
            $i = 1;
        @endphp
         <div class="input-group mb-3">
        <scroll-container class="box-con">


            @foreach ($expediente as $expediente)
                @if ($expediente == '')

                @else <label  class="form-control" >{{ $i++ . '.-' }}<br>{{ $expediente }}</label>

                @endif
            @endforeach
    

        </scroll-container>
    </div>
    </div>
    </div>
</body>

</html>
