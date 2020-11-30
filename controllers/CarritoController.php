<?php 
require_once 'models/producto.php';
class carritoController{

    public function index(){

        if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >=1){

        $carrito=$_SESSION['carrito'];
        }else{
            $carrito=array();
        }
        require_once 'views/carrito/index.php';
    }

public function add(){

    if(isset($_GET['idProducto'])){
        $idProducto= $_GET['idProducto'];
    }else{
        header('Location:'.base_url);
    }
    

    if(isset($_SESSION['carrito'])){
        $counter=0;
        foreach($_SESSION['carrito'] as $indice => $elemento){
            if($elemento['idProducto'] == $idProducto){
                $_SESSION['carrito'][$indice]['unidades']++;
                $counter++;
            }
        }

    } 
    if(!isset($counter) || $counter == 0){
        $producto=new Producto();
        $producto->setIdProducto($idProducto);
        $producto= $producto->getOne();



        if(is_object($producto)){
        $_SESSION['carrito'][] = array(
            "idProducto"=> $producto->idProducto,
            "precio"=>$producto->precioVenta,
            "unidades"=> 1,
            "producto"=>$producto
        );
        }
    }
    
    header("Location:".base_url.'carrito/index');
}

public function delete(){
    if(isset($_GET['index'])){
        $index=$_GET['index'];
        unset($_SESSION['carrito'][$index]);
    }
    header("Location:".base_url.'carrito/index');
}

public function delete_all(){
    unset($_SESSION['carrito']);
    header("Location:".base_url.'carrito/index');
}

}