<?php

class Usuario{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $telefono;
    private $edad;
    private $idTipo;
    private $estado;
    private $db;

    public function __construct(){
    $this->db =Database::connect(); 
    }

    function getIdUsuario(){
        return $this->idUsuario;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellido(){
        return $this->apellido;
    }

    function getEmail(){
        return $this->email;
    }

    function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);

    }

    function getTelefono(){
        return $this->telefono;
    }

    function getEdad(){
        return $this->edad;
    }

    function getIdTipo(){
        return $this->idTipo;
    }

    function getEstado(){
        return $this->estado;
    }


    function setIdUsuario($idUsaurio){
     $this->idUsuario;
    }

    function setNombre($nombre){
        $this->nombre= $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido){
     $this->apellido= $this->db->real_escape_string($apellido);
    }

    function setEmail($email){
     $this->email= $this->db->real_escape_string($email);
    }

    function setPassword($password){
    $this->password= $password;

    }

    function setTelefono($telefono){
    $this->telefono= $this->db->real_escape_string($telefono);
    }

    function setEdad($edad){
    $this->edad= $this->db->real_escape_string($edad);
    }

    function setIdTipo($idTipo){
    $this->idTipo=$idTipo;
    }


    function setEstado($estado){
        $this->estado= $this->db->real_escape_string($estado);
        }

    public function save(){
        $sql="INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','1','{$this->getTelefono()}','{$this->getEdad()}',SYSDATE(),'{$this->getIdTipo()}')";
        $save=$this->db->query($sql);
  
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
}

public function getAll(){
    $usuarios=$this->db->query("SELECT * FROM usuarios;");
    return $usuarios;
}

public function login(){
    $result = false;
    $email = $this->email;
    $password = $this->password;
    
    // Comprobar si existe el usuario
    $sql = "SELECT * FROM usuarios WHERE Email = '$email'";
    $login = $this->db->query($sql);

    if($login && $login->num_rows == 1){
        $usuario = $login->fetch_object();
        
        // Verificar la contraseña
        $verify = password_verify($password, $usuario->Password);
        
        if($verify){
            $result = $usuario;
        }
        
    }
    return $result;  
}
}
