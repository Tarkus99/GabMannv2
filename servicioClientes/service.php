<?php
require "config/autocarga.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$bd = new Base();
$vector = json_decode(file_get_contents("php://input"), true);
$data;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['email']) and isset($_GET['pass'])) {
        $cl = new Cliente($_GET['email'], $_GET['pass']);
        if ($result = $cl->isRegistered($bd->link)) {
            header("HTTP/1.1 200 OK");
            echo json_encode(array(
                "succes" => true,
                "detalle" => $result
            ));
            exit();
        } else {
            $data = array(
                "succes" => false,
                "detalle" => "Correo electrónico y/o contraseña incorrectos."
            );
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cl = new Cliente($vector['email'], $vector['pass'], $vector['dniCliente'], $vector['name'], $vector['direccion']);
    try {
        if ($p = $cl->getByEmail($bd->link)) {
            header("HTTP/1.1 498 Bad Request");
             echo json_encode(array(
                "succes" => false,
                "detalle" => "Ya existe un cliente con esa dirección de email."
            ));
            exit();
        } else if ($cl->getByDni($bd->link)) {
            header("HTTP/1.1 499 Bad Request");
            echo json_encode(array(
                "succes" => false,
                "detalle" => "Ya existe un cliente con ese DNI."
            ));
            exit();
        } else {
            if ($cl->insert($bd->link)) {
                header("HTTP/1.1 200 OK");
                echo json_encode(
                    array(
                        "succes" => true,
                        "detalle" => $vector['name']
                        )
                );
                exit();
            }
        }
    } catch (Exception $e) {
        header("HTTP/1.1 497 Bad Request");
        echo json_encode(
            array(
                "succes" => false,
                "detalle" => $e->getMessage()
            )
        );
        exit();
    }
}
header("HTTP/1.1 400 Bad Request");
echo json_encode(false);
exit();
