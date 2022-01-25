<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/style_events.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}">
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="cuerpo">
    <header class="header">
       
        <div class="header-container">
        <figure class="header-img">
            <img src="/static/img/cow.png" alt="">
        </figure>
            <span class="header-titile">Rancho Yeccan</span>
        </div>
    </header>


    <div class=titulo>
        <h1 style="text-align: center;"> Usuarios </h1>
        
        
        </div>
        <div style="width: max-content;
        margin: auto;">
        <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
       
        
        <a class="agregar"href="/usuarios/create" ><span class="fas fa-plus"></span>Añadir nuevo usuario</a>
        </div>
        
    <table >

    
        <thead>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Acciones</th>
        </thead>
        @forelse($trabajadores as $trabajo)
        <tr>
        
            <td class="nombre"><h3>{{$trabajo->nombre}}</h3></td>
           
            <td class="nombre"><h3>{{$trabajo->rol}}</h3></td>
            <td>   
                <a class="acciones" href="/usuarios/{{$trabajo->id}}/edit"><span class="fas fa-edit"></span>Editar</a>
                <a class="acciones" href="/usuarios/{{$trabajo->id}}"><span class="fas fa-book-open"></span>Mostrar</a>
                <form action="/usuarios/{{$trabajo->id}}" class="formulario" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="eliminar" type="submit"><span class="fas fa-trash-alt" title="Eliminar"></span>Eliminar</button>
                </form>
            
            </td>
        </tr>
        @empty
            <tr>
            <td colspan="3">sin registros</td>
            </tr>
        @endforelse
        </table>
</body>

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
</html>