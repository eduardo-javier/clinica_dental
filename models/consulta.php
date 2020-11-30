<?php

class Consulta{
    private $idConsulta;
    private $idUsuario;
    private $horaFecha;
    private $descripcion;
    private $estado;
    private $horas;
    private $db;


    public function __construct(){
        $this->db =Database::connect(); 
        }

    function getIdConsulta(){
        return $this->idConsulta;
    }

    
    function getIdUsuario(){
        return $this->idUsuario;
    }

    
    function getHoraFecha(){
        return $this->horaFecha;
    }

    
    function getDescripcion(){
        return $this->descripcion;
    }

    
    function getEstado(){
        return $this->estado;
    }

    
    function getHoras(){
        return $this->horas;
    }


    function setIdConsulta($idConsulta){
        $this->idConsulta;
    }

    function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }

    function setHoraFecha($horaFecha){
        $this->horafecha= $this->db->real_escape_string($horaFecha);
    }
    
    function setDescripcion($descripcion){
        $this->descripcion= $this->db->real_escape_string($descripcion);
    }
    
    function setEstado($estado){
        $this->estado= $this->db->real_escape_string($estado);
    }

    function setHoras($horas){
        $this->horas= $this->db->real_escape_string($horas);
    }
    
    public function save(){
        $sql="INSERT INTO consultas VALUES(NULL,'{$this->getIdUsuario()}',
        'SYSDATE()','{$this->getDescripcion()}','1','1')";

         $save= $this->db->query($sql);
    
        $result = false;
		if($save){
			$result = true;
		}
		return $result;
}

}