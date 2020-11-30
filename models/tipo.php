<?php

class Tipo{
    private $idTipo;
    private $Descripcion;

    private $db;

    public function __construct(){
    $this->db =Database::connect(); 
    }

    function getIdTipo(){
        return $this->idTipo;
    }

    function getDescripcion(){
        return $this->Descripcion;
    }

    function setIdTipo($idTipo){
        $this->idTipo= $this->db->real_escape_string($idTipo);
        }

        function setDescripcion($Descripcion){
            $this->Descripcion= $this->db->real_escape_string($Descripcion);
            }

            public function getAll(){
                $tipos=$this->db->query("SELECT * FROM tipo;");
                return $tipos;
            }


}