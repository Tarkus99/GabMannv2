<?php
require '../config/autocarga.php';
require '../config/utiles.php';
$idUnico;

if(isset($_COOKIE['idUnico']))
    $idUnico = "'".$_COOKIE['idUnico']."'";
else
    $idUnico = 'false';

$url = '../servicioProductos/service.php';

$rawProducts = file_get_contents($url);
$html = lista(json_decode($rawProducts, true), '', '', '');

include '../vistas/v_inicio.html';
include '../vistas/v_products.php';
