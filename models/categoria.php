<?php

class Categoria{
    private $idCategoria;
    private $Descripcion;
    private $db;

    public function __construct(){
    $this->db =Database::connect(); 
    }

    
    function getIdCategoria(){
        return $this->idCategoria;
    }

    function getDescripcion(){
        return $this->Descripcion;
    }


    function setIdCategoria($idCategoria){
        $this->idCategoria=$idCategoria;
    }

    function setDescripcion($Descripcion){
        $this->Descripcion= $this->db->real_escape_string($Descripcion);
    }

    public function getAll(){
        $categorias=$this->db->query("SELECT * FROM categoriaproductos;");
        return $categorias;
    }

    public function getOne(){
        $categoria=$this->db->query("SELECT * FROM categoriaproductos WHERE idCategoria={$this->getIdCategoria()}");
            return $categoria->fetch_object();
        }

    public function save(){
        $sql= "INSERT INTO categoriaproductos VALUES(NULL,'{$this->getDescripcion()}')";
        $save= $this->db->query($sql);
    
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

}