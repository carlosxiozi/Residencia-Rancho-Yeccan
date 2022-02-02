<?php
ob_start();
?>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
<img style="position: absolute; top:0" src="" alt="">

    <div>
        
        <div style="width: 80%; hegth:100%; margin:auto; margin-top:50px; border-top:3px solid; border-bottom:3px solid ; padding:10px">
            <h1>Ficha tecnica de:  {{ $animales1->nombre }}</h1>
            <div style="padding: 10px; ">
                <span style="padding: 10px; padding-top:5px; border:1px solid; border-radius: 5px; background:rgba(221, 216, 216, 0.605);">Nombre:</span>
                <label style="padding: 10px; border-bottom:1px solid" for=""> {{ $animales1->nombre }}</label>
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
        

    </div>
    
    <footer>
        <div style="position: absolute; bottom:0 ; right:0;margin: 5px">
            <label style="color: rgb(98, 97, 97)" for="">Impreso el: {{\Carbon\Carbon::now()->format('d/m/Y')}}</label>
        </div>
    </footer>

</body>

</html>

<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(['isRemoteEnabled' => true]);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream('archivo_.pdf', ['Attachment' => false]);
?>
