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
    <title>Evento</title>
</head>
<body>
    <center>
    <div class=titulo>
    <h1> Eventos </h1>
    
    
    </div>
    <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
    </center>
    <center>
    <a class="agregar"href="/eventos/create" ><span class="fas fa-plus"></span>Añadir Evento</a>
    <table border="1">
    <thead>
        <th>Nombre</th>
        <th>fecha</th>
        <th>Acciones</th>
    </thead>
    @forelse($eventos1 as $evento)
    <tr>
        <td class="nombre" width="300px">{{$evento->nombre_evento}}</td>
        <td class="nombre" width="300px">{{$evento->fecha_inicial}}</td>
        <td>
            <center>
            <a class="acciones" href="/eventos/{{$evento->id}}/edit"><span class="fas fa-edit"></span>Editar</a>
            <a class="acciones" href="/eventos/{{$evento->id}}"><span class="fas fa-book-open"></span>Mostrar</a>
            <form action="/eventos/{{$evento->id}}" class="formulario" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="eliminar" type="submit"><span class="fas fa-trash-alt" title="Eliminar"></span>Eliminar</button>
            </form>

        
            <script>
        eliminar=document.getElementsByClassName('formulario');
    for(let i = 0; i < eliminar.length; i++){
        eliminar[i].addEventListener('submit', function(e){
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
               
            </center>
        </td>
    </tr>
    @empty
        <tr>
        <td colspan="3">sin registros</td>
        </tr>
    @endforelse
    </table>
    </center>
</body>
</html>





