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
    <title>Evento</title>
</head>
<body>
<header class="header">
       
       <div class="header-container">
       <figure class="header-img">
           <img src="/static/img/cow.png" alt="">
       </figure>
           <span class="header-titile">Rancho Yeccan</span>
       </div>
   </header>

   
    <div class=titulo>
    <h1 style="text-align: center;"> Eventos </h1>
    
    
    </div>
    <div style="width: max-content;
    margin: auto;">
    <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
   
    @can('createE',App\Models\Evento::class)
    <a class="agregar"href="/eventos/create" ><span class="fas fa-plus"></span>Añadir Evento</a>
    @endcan
    </div>
    
    <table >

    
<thead>

    <th>Nombre</th>
    <th>fecha inicial</th>
    <th>Acciones</th>
    <th>Estado</th>
</thead>
@forelse($eventos1 as $evento)

@if(\Carbon\Carbon::today()->gte($evento->fecha_inicial) & \Carbon\Carbon::today()->lte($evento->fecha_final))
@php
$estado=1;
@endphp
@elseif(\Carbon\Carbon::today()->gte($evento->fecha_final))
@php
$estado=2;
@endphp
@else
@php
$estado=0;
@endphp
@endif
<tr>
    <td class="nombre" width="300px">{{$evento->nombre_evento}}</td>
    <td class="nombre" width="300px">{{\Carbon\Carbon::parse($evento->fecha_inicial)->format('d/m/Y')}}  </td>
    <td>
        @can('editeve', $evento)
        <a class="acciones" href="/eventos/{{$evento->id}}/edit"><span class="fas fa-edit"></span>Editar</a>
        @endcan
        <a class="acciones" href="/eventos/{{$evento->id}}"><span class="fas fa-book-open"></span>Mostrar</a>
        <form action="/eventos/{{$evento->id}}" class="formulario" method="post" style="display: inline;">
            @csrf
            @method('DELETE')
            @can('deleteeve',$evento)
            <button class="eliminar" type="submit"><span class="fas fa-trash-alt" title="Eliminar"></span>Eliminar</button>
            @endcan
        </form>
        @if($estado==1)
        <td class="nombre" width="300px"> Evento Activo  <span  style="color: #09d909;" class="dis fas fa-circle"></td>
        
        @elseif($estado==2)
        <td class="nombre" width="300px">Evento Finalizado <span  style="color:red;" class="dis fas fa-circle"></span></td>

        @else <td class="nombre" width="300px">Evento Aun no iniciado  <span  style="color:#e3e313;" class="dis fas fa-circle"></td>
        @endif
    
      
           
        </center>
    </td>
</tr>
@empty
    <tr>
    <td colspan="4">sin registros</td>
    </tr>
@endforelse
</table>
   
    </center>
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





