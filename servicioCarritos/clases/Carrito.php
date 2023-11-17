<?php
class Carrito
{
    private $idUnico;
    private $dniCliente;
    private $idProducto;
    private $cantidad;
    private $arrayCantidades;
    private $precio;

    function __construct($idUnico, $dniCliente = null, $idProducto = null, $cantidad = null, $precio = null)
    {
        $this->idUnico = $idUnico;
        $this->dniCliente = $dniCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function __get($name)
    {
        return $this->$name;
    }

    static function getAllById($con, $idUnico)
    {
        try {
            $result = $con->prepare('SELECT * FROM carrito INNER JOIN productos on carrito.idProducto = productos.idProducto where carrito.idUnico = :id');
            $result->bindParam(':id', $idUnico);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function buscar($con)
    {
        try {
            $result = $con->prepare("SELECT * FROM carrito WHERE idUnico = :idUnico AND idProducto = :idProducto");
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->execute();
            $array = ($result->fetchAll(PDO::FETCH_ASSOC));
            if (count($array) == 0)
                return array('success' => true);
            else
                return array('success' => false);
        } catch (Exception $e) {
            return array('success' => false, 'detalle'=>$e->getMessage());
        }
    }

    function insertar($con)
    {
        $time = time();
        try {
            $result = $con->prepare('INSERT INTO carrito values(:idUnico, :dni, :idProducto, :cantidad, :time_, :precio)');
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':dni', $this->dniCliente);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->bindParam(':cantidad', $this->cantidad);
            $result->bindParam(':time_', $time);
            $result->bindParam(':precio', $this->precio);
            $result->execute();
            return $result->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function updateQuantity($con)
    {
        try {
            $result = $con->prepare('UPDATE carrito SET cantidad = cantidad + :cantidad WHERE idUnico = :idUnico AND idProducto = :idProducto');
            $result->bindParam(':cantidad', $this->cantidad);
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->execute();
            return array('success'=>true);
        } catch (Exception $e) {
            return array('success'=>false, 'detalle'=>$e->getMessage());
        }
    }

    function updateDni($con)
    {
        try {
            $result = $con->prepare('UPDATE carrito SET dniCliente = ? WHERE idUnico = ?');
            $result->bindParam(1, $this->dniCliente);
            $result->bindParam(2, $this->idUnico);
            $result->execute();
            return $result->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function eliminar($con) {
        try {
            $result = $con->prepare("DELETE FROM carrito WHERE idUnico = :idUnico AND idProducto = :idProducto");
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->execute();
            return array('success'=>true);
        } catch (Exception $e) {
            return array('success'=>false, 'detalle'=>$e->getMessage());
        }
    }

    function updateQuantityAll($con){
        try {
            $filas = Carrito::getAllById($con, $this->idUnico);
            $con->beginTransaction();
            $result = $con->prepare("UPDATE carrito SET cantidad = :cantidad WHERE idUnico = :idUnico AND idProducto = :idProducto");
            $i = 0;
            $cantidad = 0;
            $idProducto = 0;
            $idUnico = $this->idUnico;
            $result->bindParam(':cantidad', $cantidad);
            $result->bindParam(':idUnico', $idUnico);
            $result->bindParam(':idProducto', $idProducto);
            foreach($filas as $f){
                $cantidad = $this->arrayCantidades[$i++];
                $idProducto = $f['idProducto'];
                $result->execute();
            }
            $con->commit();
            return array('success'=>true);
        } catch (Exception $e) {
            return array('success'=>false, 'detalle'=>$e->getMessage());
        }
    }
}
