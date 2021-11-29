<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_crud.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}"
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <title>Animales</title>
</head>
<body>
    <center>
    <div class=titulo>
    <h1> Animales </h1>
    </div>
    <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
    </center>
    <center>
    <tr class="btn_agregar"><td colspan="3"><a class="agregar" href="/animales/create"><span class="fas fa-plus"></span>Agregar Animal</a></td></tr>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @forelse($animales1 as $animal)
        <tr>
            <td class="tabla"><h3>{{$animal->nombre}}</h3></td>
            <td class="tablaimg"><img src="{{ $animal->imagen }}" width="250px"height="150px" class="img_product"></td>
        <td>
      
        <a class="acciones" href="/animales/{{$animal->id}}/edit"><span class="fas fa-edit"></span>Editar</a>
    
        <a class="acciones" href="/animales/{{$animal->id}}"><span class="fas fa-book-open"></span>Mostrar</a>
       
            <form action="/animales/{{$animal->id}}" class="formulario" method="post" style="display: inline;">
              
                @csrf
                @method('DELETE')
                <button class="eliminar" type="submit"><span class="fas fa-trash-alt" title="Eliminar"></span>Eliminar</button>
                <a href="/controles_reproductivos/{{$animal->id}}" class="cp"><span class="fas fa-long-arrow-alt-left"></span>Control reproductivo</a>
                <a href="/animales" class="cp"><span class="fas fa-long-arrow-alt-left"></span>Control productivo</a>
<script>
     eliminar1=document.getElementsByClassName('formulario');
    for(let i = 0; i < eliminar1.length; i++){
        eliminar1[i].addEventListener('submit', function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Esta seguro de eliminar?',
            text: "Este cambio sera permanente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    }
</script>
            </form>

        
        
        </td>
        </tr>
    @empty
        <tr>
        <td colspan="3">sin registros</td>
        </tr>
    @endforelse
</tbody>
    </table>
    </center>
</body>

           
</html>