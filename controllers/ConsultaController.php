<?php 
require_once 'models/consulta.php';
class ConsultaController{

    public function index(){
       
        require_once 'views/consulta/index.php';
    }

    public function save(){

        if(isset($_SESSION['identity'])){
            $idUsuario=$_SESSION['identity']->idUsuario;
            
            $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : false;

            if($descripcion){
                $consulta=new Consulta();
                $consulta->setDescripcion($descripcion);
                $consulta->setIdUsuario($idUsuario);
                $save=$consulta->save();

                if($save){
                    $_SESSION['consulta']="complete";
                }else{
                  $_SESSION['consulta']="failed";
                }

            }else{
                $_SESSION['consulta']="failed";
              }
          }
          header("Location:".base_url.'consulta/index');
    }
}

