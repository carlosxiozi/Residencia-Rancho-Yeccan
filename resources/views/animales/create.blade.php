<!DOCTYPE html>
<html lang="en">
<head>
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}">
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
    <form id="form"name="form" action="/animales" method="post" enctype="multipart/form-data">
        @csrf
        <br>
        
        <h3>Nombre: <input type="text" name="nombre" class="animalinformation" value="{{ old('nombre') }}"> <br> {!! $errors->first('nombre', '<small>:message</small>') !!}</h3>
        <input type="hidden" id="id_madre" name="madre_id" value="{{$madre_id}}">
      @if($fecha_parto)
        <h3>Fecha de nacimiento: <input type="text" readonly name="fecha_de_nacimiento"  value="{{$fecha_parto}}"></h3>
        
        @else
        <h3>Fecha de nacimiento: <input type="date" name="fecha_de_nacimiento" class="animalinformation" value="{{ old('fecha_de_nacimiento') }}"> <br> {!! $errors->first('fecha_de_nacimiento', '<small>:message</small>') !!}</h3>
        @endif
       
        <h3>Padre: <input type="text" name="padre" class="animalinformation" value="{{ old('padre') }}"> <br> {!! $errors->first('padre', '<small>:message</small>') !!}</h3>
    
        @if($madre_arete)
            <h3>Arete <input type="text" readonly name="arete"  value="{{$madre_arete}}"></h3>
        @else
            <h3>Arete: <input type="text" name="arete" class="animalinformation" value="{{ old('arete') }}"> <br> {!! $errors->first('arete', '<small>:message</small>') !!}</h3>
        @endif
       
        <h3>Peso al nacer: <input type="number" name="peso_al_nacer" class="animalinformation" value="{{ old('peso_al_nacer') }}"> <br> {!! $errors->first('peso_al_nacer', '<small>:message</small>') !!}</h3>
       
        <h3>Peso al destete: <input type="number" name="peso_al_destete" class="animalinformation" value="{{ old('peso_al_destete') }}"> <br> {!! $errors->first('peso_al_destete', '<small>:message</small>') !!}</h3>
        @if($madre_nombre)
        <h3>Madre: <input type="text" readonly name="madre"  value="{{$madre_nombre}}"></h3>
        @else
        <h3>Madre: <input id="" type="text" name="madre"></h3>
        @endif
       
       <h3> Sexo:<select name="sexo" id="sexo" > 
            <option value="" >Elija uno</option>
            <option >Macho</option>
            <option >Hembra</option>
            </select><br></h3>
        {!! $errors->first('sexo', '<small>:message</small><br>') !!}
        <h3>Imagen:<input type="file" name="imagen" accept="image/*">
        @error('imagen') <small>{{$message}}</small> @enderror <br></h3>
        
        
        
        <button  class="regreso" type="submit"><span class="far fa-check-circle"></span> Agregar</button>

        <a href="/animales" class="regreso"><span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
        </form>
      
    </div>
    </center>
    {{Session::get('madre_id')}}
</body>


    @if(Session::get('message')  )

</script>
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
    


