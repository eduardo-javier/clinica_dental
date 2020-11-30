<?php 

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria=new Categoria();
        $categorias=$categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(isset($_GET['idCategoria'])){
           
            $idCategoria=$_GET['idCategoria'];
            $categoria= new Categoria();
            $categoria->setIdCategoria($idCategoria); 

            $categoria=$categoria->getOne();
           //  var_dump($categoria);


           $producto=new Producto();
           $producto->setIdCategoria($idCategoria);
           $productos= $producto->getAllCategory();
        }
        require_once "views/categoria/ver.php";
    } 

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['Descripcion'])){
          $categoria=new Categoria();
          $categoria->setDescripcion($_POST['Descripcion']);   
          $categoria->save();
        }

        header("Location:".base_url."categoria/index");
    }
}

