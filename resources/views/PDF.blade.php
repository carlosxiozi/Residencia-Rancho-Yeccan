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
    <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    <title></title>
</head>
<?php
    $path = public_path($animales1->imagen);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<body>
    <div>
        <h2>Nombre: {{$animales1->nombre}}</h2>
        <h2>Fecha de nacimiento: {{$animales1->fecha_de_nacimiento}}</h2>
        <h2>Padre: {{$animales1->padre}}</h2>
        <h2>Sexo: {{$animales1->sexo}}</h2>
        <h2>Arete: {{$animales1->arete}}</h2>
        <h2>Peso al nacer: {{$animales1->peso_al_nacer}}</h2>
        <h2>Peso al destete: {{$animales1->peso_al_destete}}</h2>
        <h2>Madre: {{$animales1->madre}}</h2>
        <h2>Numero de partos: {{$animales1->num_parto}}</h2>
        <img width="100px" height="100px" src="<?php echo $base64 ?>" />
    </div>
        
    
    
</body>
</html>

<?php
    $html=ob_get_clean();
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');
    $dompdf->render();
    $dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>