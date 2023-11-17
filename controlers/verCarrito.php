<?php
require '../config/utiles.php';
$dniCliente;
if(isset($_COOKIE['dni']))
    $dniCliente = "'".$_COOKIE['dni']."'";
else
    $dniCliente = 'false';

$idUnico;
$idProducto = 'false';
$cantidad = 'false';
$esCompra = 'false';
$precio = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idProducto = $_POST['idProducto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $esCompra = 'true';
}

if (!isset($_COOKIE['idUnico'])) {
    $idUnico = uniqid();
    setcookie('idUnico', $idUnico, time() + 300000, '/');
} else
    $idUnico = $_COOKIE['idUnico'];

include '../vistas/v_inicio.html';
include '../vistas/v_carrito.php';
