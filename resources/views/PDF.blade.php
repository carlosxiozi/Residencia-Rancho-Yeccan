
<style>
    * {
        padding: 0;
        margin: 0;
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

</style>
<script>
        
    document.addEventListener("DOMContentLoaded", () => {
        let vaca = document.querySelector('#animal')
        
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
                        format: "a3",
                        orientation: 'portrait' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));
        
    });
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
</head>
<?php
$path = public_path($animales1->imagen);
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<body>
    <div id="ficha-tecnica">
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
                <img style="width: 100%" src="<?php echo $base64; ?>" />
            </div>
        </div>
        <footer>
            <div style="position: absolute; bottom:0 ; right:0;margin: 5px">
                <label style="color: rgb(98, 97, 97)" for="">Impreso el: {{\Carbon\Carbon::now()->format('d/m/Y')}}</label>
            </div>
        </footer>
    </div>
</body>

</html>


