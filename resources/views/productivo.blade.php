<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('static/css/estilos_animals.css') }}">
    <link rel = "stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <title>Animales</title>
</head>
<body>
    <style>
        .animal-eventos {
    display: flex;
    gap: 15px;
    flex-wrap:wrap;

}
.evento-container {
    display: flex;
    border-radius:5px;
    flex-direction: column;
    border: 1px solid;
    width: max-content;
    padding: 8px;
    box-shadow: 1px 1px 5px #000000e8;
}
form {
    display: flex;
    flex-direction: column;
    border: 1px solid;
    border-radius: 5px;
    padding: 5px;
    margin: 5px;
    width: max-content;
}
.btn1 {
    border: 0 !important;
    
    background: white !important;
    border-radius: 50%;
    padding: 5px;
    width: 25px;
    height: 25px;
}
.evento-container{
    position: relative;
}
.evento-container form{
    border: 0 !important;
    position: absolute;
    padding: 0 !important;
    right: 0;
    top: 0;

}
    </style>
    <section class="animal">
        <div class="animal-container">
            <label for="" class="animal-name">nombre: {{$animal->nombre}}</label>
          
            <label for="" class="arete">arete: {{$animal->arete}}</label>
            <figure class="animal-image_container">
                <img src="{{$animal->imagen}}" alt="" class="animal-image">
            </figure>
        </div>
        <div class="animal-eventos">
            @foreach($animal->eventos as $evento)
                <div class="evento-container" >
                    
                    <form action="/controles_productivos/{{$animal->id}}" class="formulario" method="POST">
                    @csrf
                @method('DELETE')
                <input type="hidden" name="evento_animal" value="{{$evento->pivot->id}}" />
                <input type="hidden" name="evento_id" value="{{$evento->id}}">
                
                    <button class="btn1 fas fa-trash-alt"></button>
                    </form>
                <label for="">Evento: {{$evento->nombre_evento}}</label>
                <label for="">Fecha inicial:{{$evento->nombre_evento}}</label>
                <label for="">Fecha final: {{$evento->fecha_final}}</label>
                </div>
            @endforeach
        </div>
        <div class="animal-evento">
            <label for="" class="evento"></label>
            <form action="/controles_productivos" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{$animal->id}}">
                    @foreach($eventos as $evento)
                   <label for="">
                   <input type="checkbox" value="{{$evento->id}}" name="eventos[]" class="animal-evento_name">{{$evento->nombre_evento}}
                   </label>
                    @endforeach
            <button type="submit">Enviar</button>
            </form>
                          
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
        </div>
    </section>
</body>
</html>