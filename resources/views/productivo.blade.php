<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel = "stylesheet" href="{{ asset('static/css/css/all.css') }}">
    <script src="{{asset('static/css/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('static/js/jquery-3.6.0.min.js')}}"></script>
    <title>Animales</title>
</head>
<body>
    <style>
        .animal-eventos {
    display: flex;
    gap: 15px;
    flex-wrap:wrap;

}
.nombre {
    color: black;
    font-size: 18px;
    overflow: hidden;
    background: linear-gradient(
100deg, #0ad2ff, #0273ff00);
}
 .descripcion {
    color: black;
    font-size: 15px;
    
    
}
.animal {
    display:flex;
    align-items: center;
    width: 100%;
    height: 80%;
}
.evento-container {
    display: flex;
    border-radius:5px;
    flex-direction: column;
    border: 1px solid;
    width: max-content;
    padding: 8px;
    background-color:white;
    margin: 1.5px;
    padding-right: 25px;
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
    cursor: pointer;
    background: red !important;
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
    right: -5px;
    top: -5px;

}
.animal-container{
    width: 60%;
    display: flex;
    max-width: 500px;
    height: 250px;
    flex-wrap: nowrap;
    justify-content: flex-start;
    background-image: url('/static/img/azul.jpg');
    flex-direction: row;
    align-items: center;
}
.animal-container .tarjeta{
width:100%;
border-radius: 6px;
overflow: hidden;
box-shadow: 0px 1 px 10px rgba(0,0,0,0,2);
cursor: default;
color: black;
font-size:20px;

    text-align: center;
  
}
.animal-container .tarjeta img{
width:300px;
height: 200px;
border-radius:8px;
box-shadow: 0 2px 2px rgba(0,0,0,0,2);
overflow: hidden;
text-align:center;
transition: all 0.25s;
}
.animal-container .tarjeta animal-name{
font-weight:600;
color: #black;

}
.animal-container .tarjeta animal-sec{
    padding:15px;
    font-size:200px;
    font-weight:300;
    color: #black;
    text-decoration:none;
  
    color: black;
    text-align: center;
}
.contenido {
    color: black;
    text-align: center;
    font-size: 15px;
    font-weight: 100;
}

.content_bread{
    background-color: black;
    margin-top: 0;
    
}
li{
    list-style: none;
}
ul{
    display: flex;
    padding: 5px
}
.item_selected{
    color: rgb(255, 255, 255);
    font-size: 20px;
   
}
 
.titulo{
    background: black;
    color: white;
}

.inicio{
    background:#000000;
    color:#fff;
    display:inline-block;
    font-size:1.00em;
    margin:0px;
    padding:10px 0px;
    text-align: center;
    width:100px;
    box-shadow: 0px 3px 0px #373c3c;
    text-decoration: none;
}
img {
    width: 200px;
    height: 100px;
}

.img_table:hover {
    transform: scale(2);
}
body {
    background: rgb(255, 255, 255);
    color: black;
}
span{
    margin-right: 10px;
}
    </style>
 
<center>
    <div class="titulo">
    <h1> Control Productivo </h1>
    </div>
    <div class="join">
        <a class="inicio" href="/animales" ><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
        <a class="inicio" href="/" ><span class="fas fa-home"></span>Inicio</a>
    </div>

    

    </center>
         
<div class="content_bread">
    <ul>
        
        
        <li class="item_selected">Animales> </li>
        <li class="item_selected">Productivo</li>
    </ul>
</div>
    <section class="animal">
        <div class="animal-container">
            <div class="tarjeta">
            <figure class="animal-image_container">
                <img src="{{$animal->imagen}}" alt="" class="animal-image">
            </figure>
            </div>
            <div class="contenido">
            <label for="" class="animal-name">Nombre: {{$animal->nombre}}</label><br><br>
           
            <label for="" class="animal-sec">Sexo: {{$animal->sexo}}</label><br>
            <label for="" class="animal-sec">Fecha de nacimiento: {{$animal->fecha_de_nacimiento}}</label><br>
            <label for="" class="animal-sec">Peso al destete: {{$animal->peso_al_destete}}</label><br>
            <label for="" class="animal-sec">Arete: {{$animal->arete}}</label><br>
            
        </div>
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
                    <div class="nombre">
                    <label for="">Evento: {{$evento->nombre_evento}}</label>
                    </div>
                    <div class="descripcion">
                    <label >Fecha inicial:{{$evento->fecha_inicial}}</label><br>
                    <label>Fecha final: {{$evento->fecha_final}}</label>
                    </div>
                   

                </div>
            @endforeach
        </div>
        </section>
        <div class="animal-evento">
            <label for="" class="evento"></label>
            <form action="/controles_productivos" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{$animal->id}}">
                    @php
                        $bandera5 = 0;
                    @endphp
                    @foreach($eventos as $evento)
                        @php
                            $bandera4 = 0;
                        @endphp
                    @foreach($animal->eventos as $eventoanimal)
                    @if($evento->id == $eventoanimal->pivot->evento_id)
                        @php
                            $bandera5 = $bandera5+1;
                            $bandera4 = 1;
                        @endphp
                    @endif
                    @endforeach
                    
                @if($bandera4 == 0)
                   <label for="">
                   <input type="checkbox" value="{{$evento->id}}" name="eventos[]" class="animal-evento_name">{{$evento->nombre_evento}}
                   </label>
                @endif
                   @endforeach
            @if(sizeof($eventos)== 0)
                <label> No hay eventos existentes </label>  
            @elseif(sizeof($eventos) == $bandera5)
                <label> No hay mas eventos disponibles </label>
            @else
            <button type="submit">Enviar</button>
            @endif
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
  
</body>
</html>