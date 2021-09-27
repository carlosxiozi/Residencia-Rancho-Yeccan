<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <title></title>
</head>
<body>
    <center>
    <div class=titulo>
        <h1> Parto </h1>
    </div>
    </center>
    <center>
    <div class="box">
    <label> Nuevo Animal </label><br><br>
    <div class="minibox">
    Nombre: <input class="" type="text" name="nombre"> <br>
    Peso: <input class="" type="text" name="peso"> <br>
    </div>
    Sexo:   <select name="sexo" id="sexo"> 
            <option >Elija uno</option>
            <option >Macho</option>
            <option >Hembra</option>
            </select><br><br>
    <img width="300px" src="static/img/vaca.jpg"><br>
    <textarea name="motivo" id="" cols="80" rows="15" placeholder="Observaciones"></textarea><br>
    <button class="btn_acep">Aceptar</button>
    <button class="btn_acep">Eliminar</button>
    </div>
    </center>
</body>
</html>