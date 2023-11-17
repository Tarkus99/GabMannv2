<?php
class Pedido
{
    private $dni;
    private $direccion;
    private $fecha;
    private $cuenta;
    private $idPedido;

    public function __construct($dni, $direccion, $cuenta)
    {
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->fecha = date('Y-m-d');
        $this->cuenta = $cuenta;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getMax($con)
    {
        $result = $con->query('SELECT COALESCE(max(idPedido), 0) as max from pedidos');
        return $result->fetch()['max'] + 1;
    }

    public function insert($con)
    {
        try {
            $result = $con->prepare('INSERT INTO pedidos(idPedido, fecha, dirEntrega, nTarjeta, dniCliente) values(:idPedido, :fecha, :dirEntrega, :nTarjeta, :dni)');
            $result->bindParam(':idPedido', $this->idPedido);
            $result->bindParam(':fecha', $this->fecha);
            $result->bindParam(':dirEntrega', $this->direccion);
            $result->bindParam(':nTarjeta', $this->cuenta);
            $result->bindParam(':dni', $this->dni);
            $result->execute();
            return $this->idPedido;
        } catch (Exception $e) {
            return false;
        }
    }
}
