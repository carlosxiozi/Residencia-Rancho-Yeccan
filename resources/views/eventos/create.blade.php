<div class="content_bread">
        <ul>
            <li class="item_selected">Eventos > </li>
            <li class="item_selected">Crear Evento</li>
        </ul>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}"
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <title></title>
   
</head>

<body class="cuerpo">
    <center>
    <div class="box">
    <form action="/eventos" method="post" id="formulario" enctype="off">

        @csrf
        <h3>Nombre del evento <input type="text" name="nombre"> </h3><br>
        <h3>Fecha de inicio <input type="date" name = "fecha_inicio"></h3><br>
        <h3>Fecha de terminación<input type="date" name = "fecha_final"></h3><br>
        <textarea name="descripcion" id="" cols="60" rows="10" placeholder="Descripcion"></textarea><br><br>
        
        <button  class="regreso" type="submit"><span class="far fa-check-circle"></span>agregar</button>
 <a href="/eventos" class="regreso" > <span class="fas fa-long-arrow-alt-left"></span>back</a>
    
</form>
    </div>
    </center>
    
@if(Session::has('message') == ' ok ' )

<script>
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Se agrego correctamente',
  showConfirmButton: false,
  timer: 1500
 
})
</script>

@endif
</body>


</html>


