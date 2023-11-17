<?php
class Producto
{
    private $idProducto;
    private $nombre;
    private $tipo;

    function __construct($idProducto, $nombre = '', $tipo = '')
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    static function getAll($con)
    {
        try {
            $result = $con->prepare('SELECT * FROM productos');
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getByName($con)
    {
        try {
            $str = "SELECT * FROM productos where nombre like '%" . $this->nombre . "%'";
            $result = $con->prepare($str);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getByType($con)
    {
        try {
            $str = "SELECT * FROM productos where tipo = '" . $this->tipo . "'";
            $result = $con->prepare($str);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function getById($con)
    {
        try {
            $result = $con->prepare('SELECT * FROM productos where idProducto = :id');
            $result->bindParam(':id', $this->idProducto);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
