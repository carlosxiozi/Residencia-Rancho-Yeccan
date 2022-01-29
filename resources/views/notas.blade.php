<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    <title>Notas</title>
</head>
<style>
  
    * {
      padding: 0;
      margin: 0;
  }
  body{background: #D3CCE3;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #E9E4F0, #D3CCE3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  
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
  </style>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('static/css/css/all.css') }}">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <title>Notas</title>
</head>
<header class="header">
     
  <div class="header-container">
  <figure class="header-img">
      <img src="/static/img/suizo.png" alt="">
  </figure>
      <span class="header-titile">Rancho Yeccan</span>
  </div>
</header>
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
            <option value="" >Seleccione un evento </option>
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
            <a style=" 
        right: 0%;
        position: relative;
    " class="regreso btn btn-primary" href="/"> <span class="fas fa-sign-out-alt"></span>Regresar </a>
        </form>
    
    </div>
    @endif
</body>
</html>