<div class="content_bread">
    <ul>

        <li class="item_selected">Animales > </li>
        <li class="item_selected">Ver animales</li>
    </ul>
</div>

<style>
    #lbCategoria {
        color: white;
    }

    #lu_c {
        list-style: none
    }

    img:hover {
        /* background: red; */
        transform: scale(2.0);
    }

</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/css/estilos_opciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Ficha Tecnica</title>
</head>
<body>
    
    <script>
        
        document.addEventListener("DOMContentLoaded", () => {
            let vaca = document.querySelector('#animal');
            // Escuchamos el click del botón
            const $boton = document.querySelector("#btnCrearPdf");
            $boton.addEventListener("click", () => {
                let form_evi = document.getElementById('ficha-tecnica');
                form_evi.style.display = "block";
                const $elementoParaConvertir = document.querySelector('#ficha-tecnica'); // <-- Aquí puedes elegir cualquier elemento del DOM
                html2pdf()
                    .set({
                        margin: 1,
                        filename: 'ficha tecnica de: '+vaca.innerText,
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        html2canvas: {
                            scale: 3, // A mayor escala, mejores gráficos, pero más peso
                            letterRendering: true,
                        },
                        jsPDF: {
                            unit: "in",
                            format: "a4",
                            orientation: 'portrait' // landscape o portrait
                        }
                    })
                    .from($elementoParaConvertir)
                    .save()
                    .catch(err => console.log(err))
                    .finally()
                    .then(() =>{
                        form_evi.style.display = "none";
                    });
            });
            
        });
    </script>
    <div class="container-fluid mt-5 row mx-auto">
        <div style="background: white !important" class="row col-xs col-sm col-md col-xl-6 shadow p-2 mx-auto">
            <a href="/animales" class="btn btn-info mb-3"><span class="fas fa-long-arrow-alt-left"></span>Regresar</a>
            <button class="btn btn-warning mb-3" id="btnCrearPdf">Imprimir en ficha del
                animal</button>
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre</span>
                <span class="form-control" id="animal">{{ $animales1->nombre }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Fecha de nacimiento</span>
                <span class="form-control">{{ $animales1->fecha_de_nacimiento }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Padre</span>
                <span class="form-control">{{ $animales1->padre }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Sexo</span>
                <span class="form-control">{{ $animales1->sexo }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Arete</span>
                <span class="form-control"> {{ $animales1->arete }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Peso al nacer</span>
                <span class="form-control">{{ $animales1->peso_al_nacer }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Peso al destete</span>
                <span class="form-control">{{ $animales1->peso_al_destete }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Madre</span>
                <span class="form-control">{{ $animales1->madre }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Numeros de partos</span>
                <span class="form-control">{{ $animales1->num_parto }}</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Imagen</span>
            </div>
            <div class="input-group mb-3">
                <img class="img-fluid img-thumbnail mx-auto d-block" src="{{ asset($animales1->imagen) }}" alt="">
            </div>
            <div style="">
                <label style="color: rgb(98, 97, 97)" for="">Impreso el: {{\Carbon\Carbon::now()->format('d/m/Y')}}</label>
            </div>
        </div>
    </div>

    <div id="ficha-tecnica" style="display: none;">
        <div style="width: 80%; hegth:100%; margin:auto; margin-top:50px; border-top:3px solid; border-bottom:3px solid ; padding:10px">
            <h1>Ficha tecnica de:  {{ $animales1->nombre }}</h1>
            <div style="padding: 10px; ">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Nombre:</span>
                <label id="animal" style="padding: 10px; border-bottom:1px solid" for=""> {{ $animales1->nombre }}</label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Fecha de nacimiento: </span>
                <label style="padding: 10px; border-bottom:1px solid" for="">
                    {{\Carbon\Carbon::parse( $animales1->fecha_de_nacimiento)->format('d/m/Y')}}
                   
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Padre:</span>
                <label style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->padre }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Sexo:</span>
                <label  style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->sexo }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Arete: </span>
                <label  style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->arete }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Peso al nacer: </span>
                <label  style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->peso_al_nacer }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Peso al destete:</span>
                <label style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->peso_al_destete }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Madre:</span>
                <label style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->madre }}
                </label>
            </div>
            <div style="padding: 5px;">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Numero de partos: </span>
                <label style="padding: 10px; border-bottom:1px solid" for="">
                    {{ $animales1->num_parto }}
                </label>
            </div>
            <div style="width: 70%; margin: 5px auto">
                <img style="width: 100%" src="{{ asset($animales1->imagen) }}" />
            </div>
            <br>
            <footer>
                <div style="position: absolute; bottom:10px ; right:10px;margin: 5px">
                    <label style="color: rgb(98, 97, 97)" for="">Impreso el: {{\Carbon\Carbon::now()->format('d/m/Y')}}</label>
                </div>
            </footer>
        </div>
    </div>


</body>

</html>
