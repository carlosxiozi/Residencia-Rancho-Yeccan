<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades del dia</title>
</head>
<body>
    <style>
   .body {
    background: #E0EAFC;
    background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
    background: linear-gradient(to right, #CFDEF3, #E0EAFC);
}
        .eventos-container{
            display: flex;
flex-wrap: wrap;
gap: 5px;
box-shadow: 0px 0px 5px #80808061;
justify-content: space-around;
border-radius: 5px;
margin: 8px;
font: message-box;
        }

        .evento{
            display:flex;
            flex-direction: column;
            padding:5px;
            overflow:hidden;
            background:#fff;
           
           
    box-shadow: 3px 4px 10px rgb(7 152 251 / 20%);
    
            border-color: red;
        }
        
        .animales-container {
            width: 100%;
        height:100%;
    display: inline-flex;
    flex-wrap: wrap;
    gap:15px;
}

.animal-inf, .animal-reproductivo, .animal-productivo {
    border-bottom:1px solid;
    padding: 5px;
    font-size: 17px;
}
.header-container {
    display: flex;
    background: white;
    height: 70px;
    align-items: center;
    justify-content: center;
    background: #E0EAFC;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #CFDEF3, #E0EAFC);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

span.header-titile {
    align-items: end;
    font-size: 4rem;
}

.header-img {
    width: 85px;
    height: 100%;
    border-radius: 50%;
    padding: 0;
    margin: 0;
}

.header-img img {
    width: 100%;
    height: 100%;
}

.animal-eve{
    
    padding: 5px;
    font-size: 17px;  
    border-top: 1px solid;
}
.animal-body {
    flex: 1;
    font-size: 1.4rem;
    border-top: 1px solid;
    margin: 10px 0;
}
.animal-productivo {
    display: flex;
    flex-direction: column;
}
.animal {
    display: flex;
    flex-direction:column;
    flex-grow:1;
   
    padding: 5px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 5px #80808082;
}
@media screen and (min-width: 600px) {
    .animal{
        width:min-content;
    }
}
    </style>

<center>
<header class="header">
       
       <div class="header-container">
       <figure class="header-img">
           <img src="/static/img/cow.png" alt="">
       </figure>
           <span class="header-titile">Rancho Yeccan</span>
       </div>
   </header>
</center>
   
    <section class="eventos">
        <div class="eventos-container">
            <h2 
            style="width: 100%; padding: 5px;"
         >Eventos Activos: </h2>
        @foreach($eventos as $evento)
            @php
                $bandera = 0;
            @endphp
            @foreach($var as $event)
                @if($evento->id == $event->evento_id)
                    @php
                        $bandera = 1;
                    @endphp
                @endif
            @endforeach
            @if($bandera == 1)
            <div class="evento">
                <label for="">Nombre: {{$evento->nombre_evento}}</label>
                <label for="">Descripción: {{$evento->descripcion}}</label>
                <label for="">Fecha inicial: {{\Carbon\Carbon::parse($evento->fecha_inicial)->format('d/m/Y')}}</label>
                <label for="">Fecha Final: {{\Carbon\Carbon::parse($evento->fecha_final)->format('d/m/Y')}}</label>
            </div>
            @endif
                
        @endforeach
        </div>
    </section>
    <section class="animales">
        <div class="animales-container">

        @foreach($animales as $animal)

        @php
        $fechas=0;
        @endphp

        
        
        @if(sizeof($animal->eventos) >0)
        @foreach($animal->eventos as $fecha)
        @php
        $fechaini=\Carbon\Carbon::createFromDate($fecha->fecha_inicial);
        $fechafin=\Carbon\Carbon::createFromDate($fecha->fecha_final);

        @endphp

        @if(\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
            @php
                $fechas = 1;
            @endphp
        @endif
        @endforeach
        @if($fechas==1)
        @if($animal->sexo =="Hembra")
        <div class="animal">
           
           <img src="{{$animal->imagen}}" alt="" style="width:55%; height: 100%; margin:auto">
           <div class="animal-body">
               <div class="animal-inf">
                   
                   Nombre: {{$animal->nombre}}
               </div>
               <div class="animal-inf">
                  Arete: {{$animal->arete}}
               </div>
               <div class="animal-inf">
                  Sexo:  {{$animal->sexo}}
               </div>

               <div class="animal-reproductivo">
               @foreach($animal->control_reproductivo as $fecha)
        @php 
            $nueva_fecha=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->subDays(7);
            $fecha_final=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->addDays(1);
            $dias=\Carbon\Carbon::now()->diffInDays($fecha->fecha_de_parto);
            $horas=\Carbon\Carbon::now()->diffInHours($fecha->fecha_de_parto) - $dias * 24;
            $hoy=\Carbon\Carbon::now();
            $fechaf=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto);
        @endphp
        
        @if(\Carbon\Carbon::now()->gte($nueva_fecha) & \Carbon\Carbon::now()->lte($fecha_final))
        
                        
            @php
                $fechas = 1;
            @endphp
        @endif
        @endforeach
               

                   @foreach($animal->control_reproductivo as $controlRep)
                   @if($controlRep->estado_animal == 0)


                   <label for="">Estado: Sin preñar</label>
                   @elseif($controlRep->estado_animal == 1)
                   <label for="">Estado: embarazada</label>
                   @if($fechas==1)
                   <div class="animal-inf">

                   @if(\Carbon\Carbon::today()->eq($fechaf))
                        Ya es la fecha indicada de parto. 
                    @else
    Fecha de parto:  {{\Carbon\Carbon::parse($controlRep->fecha_de_parto)->format('d/m/Y')}} Faltan {{$dias}} dias con {{$horas}} horas.
                    @endif
                 
               </div>
                  
                    @endif
                   @endif

                   @endforeach
               </div>

               <div class="animal-productivo">
                   
               <h2 style="font-size:18px; text-align:center;"> Eventos: </h2>
                  @foreach($animal->eventos as $eventoA)
                  @php
        $fechaini=\Carbon\Carbon::createFromDate($eventoA->fecha_inicial);
        $fechafin=\Carbon\Carbon::createFromDate($eventoA->fecha_final);

        @endphp
                  @if(\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                    <div class="animal-eve">
                        <label for="">Nombre del evento: {{$eventoA->nombre_evento}}</label><br>
                        <label for="">Fecha inicial:{{\Carbon\Carbon::parse($eventoA->fecha_inicial)->format('d/m/Y')}}</label><br>
                        <label for="">Fecha final:{{\Carbon\Carbon::parse($eventoA->fecha_final)->format('d/m/Y')}}</label>
                    </div>  
                    @endif
                  @endforeach
               </div>
           </div>
          
           </div>
        @elseif($animal->sexo == "Macho")
        <div class="animal">
           
           <img src="{{$animal->imagen}}" alt="" style="width:55%; height: 100%; margin:auto">
           <div class="animal-body">
               <div class="animal-inf">
                   Nombre: {{$animal->nombre}}
               </div>
               <div class="animal-inf">
                  Arete: {{$animal->arete}}
               </div>
               <div class="animal-inf">
                  Sexo:  {{$animal->sexo}}
               </div>
               
               <div class="animal-productivo">
               <h2 style="font-size:18px; text-align:center;"> Eventos: </h2>
               
               
                  @foreach($animal->eventos as $eventoA)
                  @php
        $fechaini=\Carbon\Carbon::createFromDate($eventoA->fecha_inicial);
        $fechafin=\Carbon\Carbon::createFromDate($eventoA->fecha_final);

        @endphp
                  @if(\Carbon\Carbon::today()->gte($fechaini) & \Carbon\Carbon::today()->lte($fechafin))
                   
               <div class="animal-eve">
               
                 <label for="">Nombre del evento: {{$eventoA->nombre_evento}}</label><br>
                 <label for="">Fecha inicial: {{\Carbon\Carbon::parse($eventoA->fecha_inicial)->format('d/m/Y')}}</label><br>
                 <label for="">Fecha final: {{\Carbon\Carbon::parse($eventoA->fecha_final)->format('d/m/Y')}}</label>
                 
               </div>
               @endif
                  @endforeach
       
               </div>
           </div>
          
           </div>
        @endif
        @endif
        @else
        @foreach($animal->control_reproductivo as $fecha)
        @php 
            $nueva_fecha=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->subDays(7);
            $fecha_final=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto)->addDays(1);
            $dias=\Carbon\Carbon::now()->diffInDays($fecha->fecha_de_parto);
            $horas=\Carbon\Carbon::now()->diffInHours($fecha->fecha_de_parto) - $dias * 24;
            $hoy=\Carbon\Carbon::today()->toDateString();

            $fechaf=\Carbon\Carbon::createFromDate($fecha->fecha_de_parto);
        @endphp
        
        @if(\Carbon\Carbon::now()->gte($nueva_fecha) & \Carbon\Carbon::now()->lte($fecha_final))
            @php
                $fechas = 1;
            @endphp
        @endif
        @endforeach
        
            @foreach($animal->control_reproductivo as $controlRep)
                @if($controlRep->estado_animal == 0)
              
                @elseif($controlRep->estado_animal == 1)
                    @if($fechas==1)

           
                <div class="animal">
           
           <img src="{{$animal->imagen}}" alt="" style="width:55%; height: 100%; margin:auto;">
           <div class="animal-body">
               <div class="animal-inf">
                   Nombre: {{$animal->nombre}}
               </div>
               <div class="animal-inf">
                  Arete: {{$animal->arete}}
               </div>
               <div class="animal-inf">
                  Sexo:  {{$animal->sexo}}
               </div>
               <div class="animal-reproductivo">
                <label for="">Estado: embarazada</label>
               </div>
               <div class="animal-inf">
               @if(\Carbon\Carbon::today()->eq($fechaf))
                        Ya es la fecha indicada de parto. 
                    @else
    Fecha de parto:  {{\Carbon\Carbon::parse($controlRep->fecha_de_parto)->format('d/m/Y')}} Faltan {{$dias}} dias con {{$horas}} horas.
                    @endif
                 
               </div>
               </div>
                </div>
               @endif
                @endif
            @endforeach
               

        @endif
        @endforeach
        
        </div>
    </section>
</body>
</html>