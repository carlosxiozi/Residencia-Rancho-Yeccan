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
<body>
    <center>
    <div class=titulo>
    <h1> Control Reproductivo </h1>
    </div>
    </center>


    <center>
    <button class="agregar" id="agregar" ><span class="fas fa-plus"></span>Añadir </button>
    </center>
    <div class="overlay" id = "overlay">
        <div class="popup" id = "popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Ingrese la fecha de servicio</h3>
            <form id="formulario" enctype="off">
                <div class="contenedor-inputs">
                    @csrf
                    <input type="date" id="fecha_servicio" name="fecha_servicio">
                </div>
                <button  class="btn-submit" id="boton" type="submit"><span class="far fa-check-circle"></span>agregar</button>
            </form>

        </div>
    </div>



    <table border="1" id="tabla">
    <thead>
        <th>Fecha de servicio</th>
        <th>Fecha de revision o parto</th>
        <th>Acciones</th>
    </thead>
    @forelse($reproductivo1 as $reproductor)
    <tr>
        
        <td class="nombre_pro" width="400px">{{$reproductor->fecha_de_servicio}}</td>
        <td class="fecha_naci" width="400px">{{$reproductor->fecha_de_parto}}</td>
        <td>
            <center>
                <a href="/" class="acciones"><span class="fas fa-long-arrow-alt-left"></span>Revisar</a>
                <form action="/controles_reproductivos/{{$reproductor->id}}" class="formulario" method="post" style="display: inline;">
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
</body>
</html>