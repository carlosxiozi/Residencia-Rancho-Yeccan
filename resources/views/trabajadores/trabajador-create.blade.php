<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script> src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
</head>
<div class="content_bread">
    <ul>
        <li class="item_selected">Usuarios > </li>
        <li class="item_selected">Crear nuevo usuario</li>
    </ul>
</div>
<body>
    <section class="trabajador-create">
        <center>
        <div class="box">
            <form action="/usuarios" method="POST" class="trabajador-form">
                @csrf
               
                <h3>Nombre <input type="text" name="nombre"><h3> <br>
                <h3>Apellidos: <input type="text" name="apellidos"><h3> <br>
               <h3>Contraseña <input type="password" name="contrasena"><h3> <br>
                <h3>Confirmar Contraseña<input type="password" name="contrasena_conf"><h3> <br>
                <h3>Numero de telefono<input type="text" name="telefono"><h3> <br>
                <select name="rol" id="">
                    <option value="">Seleccione un rol</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Trabajador">Trabajador</option>
                </select> <br>
                <button    class="regreso" type="submit">Agregar</button>
                <a href="/usuarios" class="regreso" > <span class="fas fa-long-arrow-alt-left"></span>regresar</a>
              
            </form>
            <center>
        </div>
    </section>
    
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
@elseif(Session::has('msg') == ' falta ' )

<script>
Swal.fire({
  position: 'top-center',
  icon: 'error',
  title: 'Fecha atrasada',
  showConfirmButton: false,
  timer: 1500
 
})

</script>
@endif
</body>


</html>