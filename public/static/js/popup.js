window.addEventListener("load", function() {
    let btnAbrirPopup = document.getElementById('agregar'),
        overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarPopup = document.getElementById('btn-cerrar-popup');


    btnAbrirPopup.addEventListener('click', function() {
        overlay.classList.add("active")
        popup.classList.add("active")
    });

    btnCerrarPopup.addEventListener('click', function() {
        overlay.classList.remove("active")
        popup.classList.remove("active")
    });
   

    let agregar = document.getElementById('boton'),
    tabla = document.getElementById('tabla'),
    fila = document.createElement("tr"),
    celda = document.createElement("td");
    agregar.addEventListener('click',function(event) {
        event.preventDefault();
        let _token = $("input[name='_token']").val();
        let input = document.getElementById('fecha_servicio').value;
        $.ajax({
            url:'/controles_reproductivos',method:'POST',data:{_token:_token,fecha_servicio:input}
        }) .done(function(res){
        response = JSON.parse(res);
        overlay.classList.remove("active")
        popup.classList.remove("active")
        document.getElementById("formulario").reset();
        });
    });





})





