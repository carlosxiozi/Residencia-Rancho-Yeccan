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
        <li><label id="lbCategoria">Nombre del evento: {{$eventos1->nombre_evento}}</label></li>
        <li><label id="lbCategoria">Fecha de inicio: {{$eventos1->fecha_inicial}}</label></li>
        <li><label id="lbCategoria">Fecha de terminación: {{$eventos1->fecha_final}}</label></li>
        <li><label id="lbCategoria">Descripción: {{$eventos1->descripcion}}</label></li>
        <a href="/eventos">Regresar</a>
        
    </lu>
    
    