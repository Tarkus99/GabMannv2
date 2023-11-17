<?php
require '../config/utiles.php';
require '../config/autocarga.php';
$bd = new Base();
$pdo = $bd->link;
$mensaje;
if (isset($_COOKIE['idUnico'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pedido = new Pedido($_COOKIE['dni'], $_POST['direccion'], $_POST['cuenta']);
        try {
            $pedido->idPedido = $pedido->getMax($pdo);
            $pdo->beginTransaction();
            $lastId = $pedido->insert($pdo);
            $html =
                '<table cellspacing="0" cellpadding="1" border="1">
                <tr>
                    <th>ID PEDIDO</th>
                    <th>Cliente</th>
                    <th>Direccion</th>
                </tr>   
                <tr>
                    <th>' . $lastId . '</th>
                    <th>' . $_COOKIE['nombre'] . '</th>
                    <th>' . $_POST['direccion'] . '</th>
                </tr> 
            </table>    
            ';
            if ($lastId) {
                $result = Carrito::getAllById($pdo, $_COOKIE['idUnico']);
                $html.=Linea::insertarTodas($pdo, $result, $lastId);
                $html .= '</table>';
            }
            Carrito::deleteAll($pdo, $_COOKIE['idUnico']);
            $pdo->commit();
            setcookie('nombre', '', time()-1000, '/');
            setcookie('dni', '', time()-1000, '/');
            setcookie('idUnico', '', time()-1000, '/');
            require '../pdf/TCPDF-main/prueba.php';
        } catch (Exception $e) {
            $pdo->rollback();
            $mensaje = $e->getMessage();
            require '../vistas/mensaje.php';
        }
    } else {
        $cl = new Cliente('', '', $_COOKIE['dni']);
        $direccion = $cl->getDir($pdo)['direccion'];
        require '../vistas/formularioCarrito.php';
    }
} else {
    header("Location: index.php");
}
