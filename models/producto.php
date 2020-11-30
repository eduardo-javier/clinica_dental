<?php

class Producto{
    private $idProducto;
    private $idCategoria;
    private $Nombre;
    private $stock;
    private $precioCompra;
    private $precioVenta;
    private $estado;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
    $this->db =Database::connect(); 
    }

    function getIdProducto(){
        return $this->idProducto;
    }

    function getIdCategoria(){
        return $this->idCategoria;
    }

    function getNombre(){
        return $this->Nombre;
    }

    function getStock(){
        return $this->stock;
    }

    function getPrecioCompra(){
        return $this->precioCompra;
    }

    function getPrecioVenta(){
        return $this->precioVenta;
    }

    function getEstado(){
        return $this->estado;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getImagen(){
        return $this->imagen;
    }

    function setIdProducto($idProducto){
        $this->idProducto=$idProducto;
    }

    function setIdCategoria($idCategoria){
        $this->idCategoria= $idCategoria;
    }
   
    function setNombre($Nombre){
        $this->Nombre= $this->db->real_escape_string($Nombre);
    }

    function setStock($stock){
        $this->stock= $this->db->real_escape_string($stock);
    }

    function setPrecioCompra($precioCompra){
        $this->precioCompra= $this->db->real_escape_string($precioCompra);
    }

    function setPrecioVenta($precioVenta){
        $this->precioVenta= $this->db->real_escape_string($precioVenta);
    }

    function setEstado($estado){
        $this->estado= $this->db->real_escape_string($estado);
    }

    function setFecha($fecha){
        $this->fecha= $this->db->real_escape_string($fecha);
    }

    function setImagen($imagen){
        $this->imagen= $this->db->real_escape_string($imagen);
    }

    public function getAll(){
        $productos=$this->db->query("SELECT * FROM productos ORDER BY idProducto DESC");
        return $productos;
    }

    public function getAllCategory(){
        $sql="SELECT p.* , c.Descripcion AS 'catDescripcion' FROM productos p INNER JOIN categoriaproductos c ON c.idCategoria = p.idCategoria WHERE p.idCategoria = {$this->getIdCategoria()} ORDER BY idProducto DESC";
        $productos= $this->db->query($sql);
        return $productos;
    }


    public function getOne(){
    $producto=$this->db->query("SELECT * FROM productos WHERE idProducto={$this->getIdProducto()}");
        return $producto->fetch_object();
    }

    public function getRandom($limit){
        $productos=$this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;

    }

    public function save(){
        $sql= "INSERT INTO productos VALUES (NULL,{$this->getIdCategoria()},'{$this->getNombre()}',
        {$this->getStock()},{$this->getPrecioCompra()},{$this->getPrecioVenta()},
        '1',SYSDATE(),'{$this->getImagen()}')";
        $save= $this->db->query($sql);
    
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }


    public function delete(){
    $sql= "UPDATE productos SET estado='0' WHERE idProducto={$this->idProducto}";
        $delete= $this->db->query($sql);

        $result = false;
		if($delete){
			$result = true;
		}
		return $result;
    }

    public function edit(){
        $sql= "UPDATE productos SET idCategoria={$this->getIdCategoria()}, Nombre='{$this->getNombre()}', stock={$this->getStock()}, precioCompra ={$this->getPrecioCompra()}, precioVenta={$this->getPrecioVenta()} ";

          if($this->getImagen() !=null){
          $sql .=",imagen= '{$this->getImagen()}'";
        }
          $sql .=" WHERE idProducto={$this->idProducto};";
        $save= $this->db->query($sql);
    
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }


    }

