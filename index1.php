<?php 
    require 'clases_php/ClaseConsultar.php';                     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de votacion</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body onload="cargarCantidatos()">

<!-- <div id="demo"></div> -->
    <form id="frm">
        <div class="contenedor1">
        <div><h4 style="color: red; height: 20px;" id="msje_alerta"></h4></div>
            <div class="contenedor2">
                <div class="item item-cabecera"> <h3>FORMULARIO DE VOTACIÓN:</h3></div>
                <div class="item"><label for="">Nombre y Apellido</label></div>
                <div class="item"><input type="text" id="id_nombre"></div>
                <div class="item"><label for="">Alias</label></div>
                <div class="item"><input type="text" id="id_alias"></div>
                <div class="item"><label for="">Rut</label></div>
                <div class="item"><input type="text" id="id_rut"></div>
                <div class="item"><label for="">Email</label></div>
                <div class="item"><input type="text" id="id_email"></div>
                <div class="item"><label for="">Región</label></div>
                <div class="item">
                    <select class="seleccion_region" onchange="seleccionarRegion()" id="id_region">
                        <?php
                            $objConsultarRegiones = new Consultar();
                            $objConsultarRegiones->consultarRegiones();
                        ?>
                    </select>
                </div>
                <div class="item"><label for="">Comuna</label></div>
                <div class="item">
                    <select name="name_comuna" id="id_comuna">
                    </select>
                </div>
                <div class="item"><label for="">Candidato</label></div>
                <div class="item">
                    <select class="seleccion_candidato" id="id_candidato"></select>
                </div>
                <div class="item"><label for="">Como se enteró de nosotros </label></div>
                <div class="item">
                    <label for="">Web</label>           <input type="checkbox" id="id_web" value="Web">
                    <label for="">TV</label>            <input type="checkbox" id="id_tv" value="TV">
                    <label for="">Redes sociales</label><input type="checkbox" id="id_redSocial" value="Redes Sociales">
                    <label for="">Amigo</label>         <input type="checkbox" id="id_amigo" value="Amigo">
                </div>
                <div class="item"><button id="btn">Votar</button></div>
                <div class="item"></div>
            </div>
        </div>
    </form>

    <script>
        
        function seleccionarRegion() {

            // Evento seleccionar
            var selectElement = document.querySelector('.seleccion_region');
            var selectedValue = selectElement.value;
            console.log("Seleccionaste la opción: " + selectedValue);

            // Fetch AJAX
            var datos = selectedValue;
            var pag = 'ejecutar_peticiones/peticion_consultarComunas_x_Region.php'
            fetch (pag, {
                method: "POST",
                body: datos
            })
            .then(response => response.text())
            .then(res => {
                console.log(res);
                document.getElementById("id_comuna").innerHTML = res
            })
        }

        function cargarCantidatos(){

            // Fetch AJAX
            var pag = 'ejecutar_peticiones/peticion_consultarCandidatos.php'
            fetch (pag)
            .then(response => response.text())
            .then(res => {
                console.log(res);
                document.getElementById("id_candidato").innerHTML = res
            })

        }

    </script>

    <script src="js/clases_validaciones.js"></script>
    
</body>
</html>