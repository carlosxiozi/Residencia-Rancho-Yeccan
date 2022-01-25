<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_crud.css') }}">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_ventana_emergente.css') }}">
    <script type ="text/javascript" src="{{asset('static/js/popup.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('static/css/css/all.css')}}">
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('static/js/jquery-3.6.0.min.js')}}"></script>
    
    <title>Reproductivo</title>
</head>
<style>

.btn_acep {
    margin-left: 20px;
}

.btn_acep {
    background: #37a8f3;
    color: #fff;
    display: inline-block;
    font-size: 1.00em;
    margin: 20px;
    padding: 10px 0px;
    text-align: center;
    width: 150px;
    box-shadow: 0px 3px 0px #373c3c;
    cursor: pointer;
    text-decoration: none;
}

.btn_acep:hover {
    transition: 500ms;
    background-color: #0be257;
    color: rgb(0, 0, 0)
}

    </style>
<body>



    <center>
    <header class="header">
       
       <div class="header-container">
       <figure class="header-img">
           <img src="/static/img/cow.png" alt="">
       </figure>
           <span class="header-titile">Rancho Yeccan</span>
       </div>
   </header>
    <div class="titulo">
    <h1> Control Reproductivo </h1>
    </div>
    <div class="join">
        <a class="inicio" href="/animales" ><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
        <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
    </div>
    </center>
    

<div class="content_bread">
    <ul>
        
        
        <li class="item_selected">Animales> </li>
        <li class="item_selected">Reproductivo</li>
    </ul>
</div>
    <input type="hidden" id="animal_id" value="{{$animal->id}}">
    <label  ><h2> <b> Nombre : {{$animal->nombre}}    </b>    </h2> </label> 
    
    <center>
    
@if($bandera == true and $j==false)
    <button class="agregar" id="agregar" ><span class="fas fa-plus"></span>Añadir </button>

@endif
@if($notifi==1)

<label  ><h2> <b>  Se llego al maximo de 4 servicios </b>    </h2> </label>
<script>
    const options = {

body: "Se llego al maximo de 4 servicios por vaca " ,

icon: '/static/img/toro.png',
interactionTimeout: 2000,

    };

new Notification('Rancho Yeccan',options); </script>

@endif

   
    <div class="overlay" id = "overlay">
        <div class="popup" id = "popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Ingrese la fecha de servicio</h3>
            <form id="formulario" enctype="off">
                <div class="contenedor-inputs">
                    @csrf
                    <input type="date" id="fecha_servicio" name="fecha_servicio">
                    <h3>Ingrese la fecha de revision</h3>
                    <input type="date" id="fecha_parto" name="fecha_parto">
                </div>
                <button  class="btn-submit" id="boton" type="submit"><span class="far fa-check-circle"></span>agregar</button>
            </form>

        </div>
    </div>


    </center>
    @php
$bandera1= null;
@endphp

@foreach($reproductivo1 as $reproductor)
@if($reproductor ->estado_animal == 1)
@php 
    $bandera1 = false; 
@endphp

<form action="/animales/create" id="formulario" method="GET">
    <center>
       
        <div class="contenedor-inputs">
        <input type="hidden" name="madre" value = "{{$animal->nombre}}">
        @php
            $fecha_parto=\Carbon\Carbon::today()->toDateString();
        @endphp
        <input type="hidden" name="fecha_parto" value = "{{$fecha_parto}}">
        <input type="hidden" name="id_madre" value="{{$animal->id}}">
        <input type="hidden" name="arete" value = "{{$animal->arete}}">
        <input type="hidden" name="num_parto" value = "{{$animal->num_parto}}">
        <label><h2><b> El parto se dara entre las fechas indicadas  : </b></h2></label>

        </div>
        @php
            $nueva_fecha=\Carbon\Carbon::createFromDate($reproductor->fecha_de_parto)->subDays(7);
            $fecha_final=\Carbon\Carbon::createFromDate($reproductor->fecha_de_parto)->addDays(7);
        @endphp
        <label><h2><b> Fecha inicial  :  {{\Carbon\Carbon::parse($nueva_fecha)->format('d/m/Y')}}  </b></h2></label>
        <label><h2><b> Fecha final  :  {{\Carbon\Carbon::parse($fecha_final)->format('d/m/Y')}}  </b></h2></label>
        @if(\Carbon\Carbon::now()->gte($nueva_fecha) & \Carbon\Carbon::now()->lte($fecha_final))
        <button   id="parto" type="submit" class="btn_acep"> <span class="far fa-check-circle"></span>Nuevo Animal</button>
        @else
        <script> alert('La fecha de parto aun no se cumple, cuando se cumpla se habilitara el boton.')</script>
        @endif
    </center>
    </form>












@elseif($reproductor ->estado_animal == 0 )
@php $bandera1 = true;
@endphp
    @endif
@endforeach




   @if($bandera1 == true)
   <table border="1" id="tabla">
    <thead>
        
        <th>Fecha de servicio</th>
        <th>Fecha de revision o parto</th>
        <th>Acciones</th>
        
    </thead>
    @forelse($reproductivo1 as $reproductor)
    <tr>
      
        <td class="nombre_pro" width="400px">{{\Carbon\Carbon::parse($reproductor->fecha_de_servicio)->format('d/m/Y')}}</td>
        
    
        <td class="nombre_pro" width="400px">{{\Carbon\Carbon::parse($reproductor->fecha_de_parto)->format('d/m/Y')}}</td>
        <td>
            <center>
                @can('revisarA', $reproductor)
                <a href="/controles_reproductivos/{{$reproductor->id}}/edit" class="acciones"><span class="fas fa-long-arrow-alt-left"></span>Revisar</a>
                @endcan
                <form action="/controles_reproductivos/{{$reproductor->id}}" class="formulario" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    @can('deleteServicio',$reproductor)
                    <button class="eliminar" type="submit"><span class="fas fa-trash-alt" title="Eliminar"></span>Eliminar</button>
                    @endcan
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
    
    
    @endif
</body>
</html>