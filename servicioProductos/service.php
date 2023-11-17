<?php
require "config/autocarga.php";
$bd = new Base();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $producto = new Producto($_GET['id']);
        header("HTTP/1.1 200 OK");
        echo json_encode($producto->getById($bd->link));
    } else {
        $result = Producto::getAll($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }
}
