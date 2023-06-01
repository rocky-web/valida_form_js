<?php

require_once '../clases_php/ClaseInsertar.php';

$name_n_a = $_POST['name_n_a'];

// instancia
$objInsertar = new ClassInsertar();

// metodos
$objInsertar->insertarRegistro($name_n_a);

