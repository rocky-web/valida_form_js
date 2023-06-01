<?php

$region = file_get_contents("php://input");

require_once '../clases_php/ClaseConsultar.php';

$objConsultarDatos = new Consultar();

$objConsultarDatos->consultarComunas($region);
