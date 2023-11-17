<?php
class Linea
{

    static function insertarTodas($con, $result, $lastId)
    {
        $html = '';
        $nlinea = 0;  $idProducto = 0;  $cantidad = 0;  $precio = 0;  $i = 1;

        $lineQuery = $con->prepare('INSERT INTO lineaspedidos values(:idPedido, :nlinea, :idProducto, :cantidad, :precio)');
        $lineQuery->bindParam(':idPedido', $lastId);
        $lineQuery->bindParam(':nlinea', $nlinea);
        $lineQuery->bindParam(':idProducto', $idProducto);
        $lineQuery->bindParam(':cantidad', $cantidad);
        $lineQuery->bindParam(':precio', $precio);
        $html .= '<h1>Resumen</h1>
                            <table cellspacing="1" cellpadding="1" border="1" style="padding: 5px 5px">
                            <tr>
                                <th>Nº Línea</th>
                                <th>ID Producto</th>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Importe</th>
                            </tr>
                            ';
        foreach ($result as $line) {
            $html .=
                '<tr>
                            <td>' . $i . '</td>
                            <td>' . $line['idProducto'] . '</td>
                            <td>' . $line['cantidad'] . '</td>
                            <td>Nombre' . $line['nombre'] . '</td>
                            <td>' . $line['precio'] * $line['cantidad'] . '</td>
                        </tr>';
            $nlinea = $i;
            $idProducto = $line['idProducto'];
            $cantidad = $line['cantidad'];
            $precio = $line['precio'];
            $lineQuery->execute();
            $i++;
        }
        return $html;
    }
}
