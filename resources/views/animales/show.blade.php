<style>
    li{
        list-style: none;
    }
    ul{
        display: flex;
        padding: 5px
    }
    .item_selected{
        color: rgb(255, 255, 255);
        font-size: 18px;
       
    }
    .content_bread{
        background-color: rgba(7, 7, 7, 0.39);
        margin-top: 0;
        margin-bottom: 5px;
    }
</style>
<div class="content_bread">
    <ul>
        <li>Inicio > </li>
        <li>Usuarios > </li>
        <li class="item_selected">Ver usuario</li>
    </ul>
</div>

<style>
    #lbCategoria{
        color: black;
    }
    #lu_c{
        list-style: none
    }
</style>

    <lu id="lu_c">
        <li><label id="lbCategoria">nombre: {{$animales1->nombre}}</label></li>
        <li><label id="lbCategoria">Fecha de nacimiento: {{$animales1->fecha_de_nacimiento}}</label></li>
        <li><label id="lbCategoria">Padre: {{$animales1->padre}}</label></li>
        <li><label id="lbCategoria">Sexo: {{$animales1->sexo}}</label></li>
        <li><label id="lbCategoria">Arete: {{$animales1->arete}}</label></li>
        <li><label id="lbCategoria">Peso al nacer: {{$animales1->peso_al_nacer}}</label></li>
        <li><label id="lbCategoria">Peso al destete: {{$animales1->peso_al_destete}}</label></li>
        <li><label id="lbCategoria">Madre: {{$animales1->madre}}</label></li>
        <li><label id="lbCategoria">Clasificacion: {{$animales1->clasificacion}}</label></li>
        
        <li><label id="lbCategoria">Imagen: </label><img width="100px" height="100px" src="{{ asset($animales1->imagen) }}" alt=""></li>
        
    </lu>
    
    