<?php
require "config/autocarga.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$bd = new Base();

$vector = json_decode(file_get_contents("php://input"), true);
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['idProducto']) && isset($_GET['idUnico'])){
        $carrito = new Carrito($_GET['idUnico'], '', $_GET['idProducto']);
        $result = $carrito->buscar($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }else{
        $result = Carrito::getAllById($bd->link, $_GET['idUnico']);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
        exit();
    }

}else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if(isset($vector['cantidad'])){
        $carrito = new Carrito($vector['idUnico'], '', $vector['idProducto'], $vector['cantidad']);
        $result = $carrito->updateQuantity($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }else if(isset($vector['arrayCantidades'])){
        $carrito = new Carrito($vector['idUnico']);
        $carrito->arrayCantidades = $vector['arrayCantidades'];
        $result = $carrito->updateQuantityAll($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }else{
        $carrito = new Carrito($vector['idUnico'], $vector['dniCliente']);
        $result = $carrito->updateDni($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode(array('success' => true, 'detalle' => $result));
        exit();
    }
    
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $carrito = new Carrito($vector['idUnico'], $vector['dniCliente'], $vector['idProducto'], $vector['cantidad'], $vector['precio']);
    if ($result = $carrito->insertar($bd->link)) {
        header("HTTP/1.1 200 OK");
        echo json_encode(array('success' => true, 'detalle' => 'Insertado con éxito'));
        exit();
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array('success' => false, 'detalle' => 'Error durante la inserción.'));
        exit();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $carrito = new Carrito($vector['idUnico'], '', $vector['idProducto']);
    $result = $carrito->eliminar($bd->link);
    header("HTTP/1.1 200 OK");
    echo json_encode($result);
    exit();
}
