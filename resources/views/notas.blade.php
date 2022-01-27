<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($bandera == 1)
    <div class="contenedor">
        @foreach($eventos1 as $eventos)
            @php
                $i=1;
            @endphp
            @if(is_null($eventos->nota))
            @else
                <label> {{$eventos->nombre_evento}} </label>
                <label>{{$i++.".-"}}{{$eventos->nota}}</label><br>
            @endif
        @endforeach
    </div>
        <h3> Evento:<select name="evento_id" id="evento_id" onchange="mostrar()"; > 
            @foreach($eventos1 as $eventos)
                <option value="{{$eventos->id}}" >{{$eventos->nombre_evento}}</option>
            @endforeach
            </select><br></h3>
    <script type="text/javascript">
        function mostrar(){
            let cod = document.getElementById('evento_id').value;
            let formNotes = document.getElementById('form_notas');
            //let seleccion = document.getElementById('seleccion');
            formNotes.setAttribute('action', '/eventos/'+cod);
            //seleccion.innerHTML = "Evento"+;
            formNotes.style.display = "block";
        }
    </script>
    <div>
    <form id="form_notas" method="post" style="display:none;" >
            @csrf
            @method('PUT')
            <h2 id="seleccion"></h2>
            <textarea class="textarea" name="notas" Onkeyup="charCount();" cols="45" rows="10" placeholder="Escribe las observaciones aqui..." maxlength="500" minlength="3"></textarea>
            <button class="btn_acep" name="estadoTrue" value="1">Agregar</button>
        </form>
    
    </div>
    @endif
</body>
</html>