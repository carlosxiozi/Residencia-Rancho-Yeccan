<div class="content_bread">
    <ul>
        
        <li class="item_selected">Animales > </li>
        <li class="item_selected">Ver animales</li>
    </ul>
</div>

<style>
    #lbCategoria{
        color: white;
    }
    #lu_c{
        list-style: none
    }
</style>

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
        <title>Ficha Tecnica</title>
    </head>
    <body>
        <center>
    <lu id="lu_c">
    <a href="/pdf/{{$animales1->id}}">Imprimir en pdf</a>
        
       <br> <li><label id="lbCategoria">Nombre: {{$animales1->nombre}}</label></li>
       <br> <li><label id="lbCategoria">Fecha de nacimiento: {{$animales1->fecha_de_nacimiento}}</label></li>
       <br> <li><label id="lbCategoria">Padre: {{$animales1->padre}}</label></li>
       <br> <li><label id="lbCategoria">Sexo: {{$animales1->sexo}}</label></li>
       <br>  <li><label id="lbCategoria">Arete: {{$animales1->arete}}</label></li>
       <br>  <li><label id="lbCategoria">Peso al nacer: {{$animales1->peso_al_nacer}}</label></li>
       <br><li><label id="lbCategoria">Peso al destete: {{$animales1->peso_al_destete}}</label></li>
       <br> <li><label id="lbCategoria">Madre: {{$animales1->madre}}</label></li>
       <br> <li><label id="lbCategoria">Numero de partos : {{$animales1->num_parto}}</label></li>
        <li><label id="lbCategoria">Imagen: </label><img width="100px" height="100px" src="{{ asset($animales1->imagen) }}" alt=""></li>
        <a href="/animales" class="regreso"><span class="fas fa-long-arrow-alt-left"></span>regresar</a>
    </lu>    </center>

    </body>
    </html>
    
    