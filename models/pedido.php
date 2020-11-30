<?php
class Pedido{
     private $idPedido;
     private $fecha;
     private $hora;
     private $idUsuario; 
     private $estado;
    private $Ciudad;
    private $Direccion;
    private $estado_pedido;
    private $coste;
    
   
    
   
    private $db;

    public function __construct(){
    $this->db =Database::connect(); 
    }

    function getIdPedido(){
        return $this->idPedido;
    }
    
    function getFecha(){
        return $this->fecha;
    }

    function getHora(){
        return $this->hora;
    }

    function getIdUsuario(){
        return $this->idUsuario;
    }

    function getCoste(){
        return $this->coste;
    }

    function getCiudad(){
        return $this->Ciudad;
    }

    function getDireccion(){
        return $this->Direccion;
    }

    function getEstado(){
        return $this->estado;
    }

    function getEstado_Pedido(){
        return $this->estado_pedido;
    }

    function setCiudad($Ciudad){
        $this->Ciudad= $this->db->real_escape_string($Ciudad);
    }
   
    function setDireccion($Direccion){
        $this->Direccion= $this->db->real_escape_string($Direccion);
    }

    function setIdPedido($idPedido){
        $this->idPedido= $idPedido;
    }

    function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }

    function setEstado($estado){
        $this->estado= $this->db->real_escape_string($estado);
    }

    function setFecha($fecha){
        $this->fecha= $this->db->real_escape_string($fecha);
    }
    function setCoste($coste){
        $this->coste= $this->db->real_escape_string($coste);
    }

    function setHora($hora){
        $this->hora= $this->db->real_escape_string($hora);
    }

    function setEstado_Pedido($estado_pedido){
        $this->estado_pedido= $this->db->real_escape_string($estado_pedido);
    }


    public function save(){
        $sql= "INSERT INTO pedidos VALUES (NULL,CURDATE(),CURTIME(),{$this->getIdUsuario()},
        '1','{$this->getCiudad()}','{$this->getDireccion()}', {$this->getCoste()},'confirm')";
        $save= $this->db->query($sql);
    
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function save_Detalle(){
        $sql="SELECT LAST_INSERT_ID() as 'pedido';";
        $query= $this->db->query($sql);
        $idPedido= $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $elemento){
            $producto=$elemento['producto']; 

  $insert="INSERT INTO detalle VALUE(NULL,{$elemento['unidades']},CURDATE(),{$idPedido},{$producto->idProducto},{$this->getIdUsuario()},'1')";
       
  $save=$this->db->query($insert);
}
$result = false;
if($save){
    $result = true;
}
return $result;

    }

    public function getAll(){
        $productos=$this->db->query("SELECT * FROM pedidos ORDER BY idPedido DESC");
        return $productos;
    }

    public function getOne(){
    $producto=$this->db->query("SELECT * FROM pedidos WHERE idPedido={$this->getidPedido()}");
     return $producto->fetch_object();
    }

    public function getOneByUser(){
        $sql="SELECT p.idPedido, p.coste FROM pedidos p INNER JOIN detalle d ON d.idPedido=p.idPedido WHERE p.idUsuario={$this->getidUsuario()} ORDER BY idPedido DESC LIMIT 1";
        $pedido=$this->db->query($sql);

         return $pedido->fetch_object();
        }

    public function getProductosByPedido($idPedido){
        //$sql= "SELECT * FROM productos WHERE idProducto IN (SELECT idProducto FROM detalle WHERE idPedido={$idPedido})";
       
    $sql="SELECT pr.*, d.cantidadCompra FROM productos pr INNER JOIN detalle d ON pr.idProducto=d.idProducto WHERE d.idPedido={$idPedido}";

        $productos=$this->db->query($sql);
        return $productos;
    }

    public function getAllByUser(){
        $sql="SELECT p.* FROM pedidos p WHERE p.idUsuario={$this->getidUsuario()} ORDER BY idPedido DESC";
        $pedido=$this->db->query($sql);

         return $pedido;
        }

        public function edit(){
        $sql= "UPDATE pedidos SET estado_pedido='{$this->getEstado_Pedido()}' ";
        
        $sql .=" WHERE idPedido={$this->getIdPedido()};";

            $save= $this->db->query($sql);
        
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }
}