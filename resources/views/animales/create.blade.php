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
<div class="content_bread">
    <ul>
        
        <li class="item_selected">Animales > </li>
        <li class="item_selected">Agregar Animal</li>
    </ul>
</div>
    <center>
    <div class="box">
    <form action="/animales" method="post" enctype="multipart/form-data">
        @csrf
        <br>
        <h3>Nombre: <input type="text" name="nombre"></h3>
      <h3>Fecha de nacimiento<input type="date" name = "fecha_de_nacimiento"></h3>
        <h3>Padre: <input type="text" name="padre"></h3>
    
  
        <h3>Arete: <input id="correos" type="text" name="arete"></h3>
      
        <h3>Peso al nacer: <input id="correos" type="text" name="peso_al_nacer"></h3>
        <h3>Peso al destete: <input id="correos" type="text" name="peso_al_destete"></h3>
        <h3>Madre: <input id="correos" type="text" name="madre"></h3>
       <h3> clasificacion:   <select name="clasificacion" id="clasificacion"> 
            <option >Elija uno</option>
            <option >Toro</option>
            <option >Vaca</option>
            <option >Becerro</option>
            </select><br></h3>
 
        <h3>Imagen:<input type="file" name="imagen" accept="image/*">
        @error('imagen') <small>{{$message}}</small> @enderror <br></h3>

        
        <button  class="regreso" type="submit"><span class="far fa-check-circle"></span>agregar</button>

        <a href="/animales" class="regreso"><span class="fas fa-long-arrow-alt-left"></span>back</a>
        </form>
    
    </div>
    </center>
</body>


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
</html>
    


