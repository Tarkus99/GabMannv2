<?php
require '../config/utiles.php';
$dniCliente;
$idUnico;

if(isset($_COOKIE['dni']))
    $dniCliente = "'".$_COOKIE['dni']."'";
else
    $dniCliente = 'false';

if(isset($_COOKIE['idUnico']))
    $idUnico = "'".$_COOKIE['idUnico']."'";
else
    $idUnico = 'false';

$product = json_decode(file_get_contents("http://localhost/proyecto_servidor_final/servicioProductos/service.php?id=" . $_GET['id']), true);

include '../vistas/v_inicio.html';
include '../vistas/v_detalle.php';
