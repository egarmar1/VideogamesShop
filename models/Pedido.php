<?php

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad) {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function getPedido() {
        $sql = "SELECT * from pedidos WHERE id={$this->id}";

        $pedido = $this->db->query($sql);

        if ($pedido->num_rows > 0) {
            return $pedido->fetch_object();
        }
        return false;
    }

    function getProductsFromPedido() {


        $sql = "SELECT p.*,d.unidades FROM productos p INNER JOIN detallespedido d ON p.id=d.id_producto WHERE d.id_pedido={$this->id}";
        $products = $this->db->query($sql);

        if ($products->num_rows > 0) {
            return $products;
        }
        return false;
    }

    function getPedidosFromUser() {
        $sql = "SELECT * from pedidos WHERE usuario_id={$this->usuario_id}";
        $pedidos = $this->db->query($sql);

        if ($pedidos->num_rows > 0) {
            return $pedidos;
        }
        return false;
    }

    function save() {
        $stats = Utils::infoCarrito();
        $sql = "INSERT INTO pedidos VALUES(null,{$this->usuario_id},'{$this->provincia}','{$this->localidad}','{$this->direccion}',{$stats['total']},'pending',CURDATE(),CURTIME())";

        $save = $this->db->query($sql);



        if ($save) {
            return true;
        }
        return false;
    }

    function save_detalles() {
        $sql = "SELECT LAST_INSERT_ID() as 'id_inserted' ";
        $query = $this->db->query($sql);
        $id = $query->fetch_object()->id_inserted;

        foreach ($_SESSION['carrito'] as $key => $element) {

            $sql = "INSERT INTO detallespedido VALUES(null,$id,{$element['id_producto']},{$element['unidades']})";
            $save = $this->db->query($sql);
        }

        if ($save) {
            return $id;
        }
        return false;
    }

}
