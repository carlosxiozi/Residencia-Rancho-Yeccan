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
        <div class="box">
           
           
            <label class="nombre">Anotaciones anteriores:  {{$reproductivo1->expediente}}" </label><br><br><br>
            <textarea class="textarea" name="motivo" Onkeyup="charCount();" cols="45" rows="10" placeholder="Escribe las observaciones aqui..." maxlength="100" minlength="3"></textarea><br>
            <button class="btn_acep">Agregar</button><br><br>
            <label class="nombre">¿La Vaca ah quedado preñada?" </label><br><br><br>

          
          <button class="btn_acep">Si</button>
          <button class="btn_acep">No</button>
      
        </div>
    

    </form>
    </center>
    
</body>
</html>