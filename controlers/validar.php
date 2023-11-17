<?php
require '../config/autocarga.php';
$bd = new Base();
$nombre = explode(' ', $_POST['name']);
setcookie('nombre', $nombre[0] . ' ' . substr($nombre[1], 0, 1) . '.', time() + 30000, '/');
setcookie('dni', $_POST['dniCliente'], time() + 30000, '/');
header("Location: " . $_POST['destino']);
