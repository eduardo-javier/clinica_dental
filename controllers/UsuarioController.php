<?php 

require_once 'models/usuario.php';


class usuarioController{
    public function index(){
        echo "controlador usuario";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){

       if(isset($_POST)){

            $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido=isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email=isset($_POST['email']) ? $_POST['email'] : false;
            $password=isset($_POST['password']) ? $_POST['password'] : false;
            $telefono=isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $edad=isset($_POST['edad']) ? $_POST['edad'] : false;
            $idTipo=isset($_POST['idTipo']) ? $_POST['idTipo'] : false;
          

            if($nombre && $apellido && $email && $password && $telefono && $edad && $idTipo){
           $usuario=new Usuario();
           $usuario->setNombre($nombre);
           $usuario->setApellido($apellido);
           $usuario->setEmail($email);
           $usuario->setPassword($password);
           $usuario->setTelefono($telefono);
           $usuario->setEdad($edad);
           $usuario->setIdTipo($idTipo);
           

          $save= $usuario->save();
          if($save){
              $_SESSION['register']="complete";
          }else{
            $_SESSION['register']="failed";
          }
        }else{
        $_SESSION['register']="failed";

        }
       }else{
        $_SESSION['register']="failed";
       
       }
       header("Location:".base_url.'usuario/registro');
    }


	public function login(){
		if(isset($_POST)){
	
			$usuario = new Usuario();
            $email=isset($_POST['email']) ? $_POST['email'] : false;
            $password=isset($_POST['password']) ? $_POST['password'] : false;
            $usuario->setEmail($email);
            $usuario->setPassword($password);
			$identity = $usuario->login();
			
                if($identity && is_object($identity)){
                    $_SESSION['identity']=$identity;

                    if($identity->idTipo=='1'){
                        $_SESSION['admin']=true;
                    }
                }else{
                    $_SESSION['error_login']="identificacion fallida";
                }
		
		}
		header("Location:".base_url);
	}
    
    
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}