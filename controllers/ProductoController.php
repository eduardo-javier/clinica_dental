<?php 
require_once 'models/producto.php';
class productoController{
    public function index(){
        $producto= new Producto();
        $productos =$producto->getRandom(6);
    
        require_once 'views/producto/destacado.php';
    }

    public function ver(){
        if(isset($_GET['idProducto'])){
         
            $idProducto=$_GET['idProducto'];
            $producto=new Producto();
            $producto->setIdProducto($idProducto);
            $product= $producto->getOne();
            }
require_once 'views/producto/ver.php';
    }

    public function gestion(){
        Utils::isAdmin();

        $producto= new Producto();

        $productos=$producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
           $idCategoria=isset($_POST['idCategoria'])? $_POST['idCategoria']: false;
           $Nombre=isset($_POST['Nombre'])? $_POST['Nombre']: false;
           $stock=isset($_POST['stock'])? $_POST['stock']: false;
           $precioCompra=isset($_POST['precioCompra'])? $_POST['precioCompra']: false;
           $precioVenta=isset($_POST['precioVenta'])? $_POST['precioVenta']: false;
           //$imagen=isset($_POST['imagen'])? $_POST['imagen']: false;

           if($Nombre && $idCategoria && $stock && $precioCompra && $precioVenta){
               $producto =new Producto();
               $producto->setIdCategoria($idCategoria);
               $producto->SetNombre($Nombre);
               $producto->setStock($stock);
               $producto->setPrecioCompra($precioCompra);
               $producto->setPrecioVenta($precioVenta);

               if(isset($_FILES['imagen'])){
               $file=$_FILES['imagen'];
               $filename=$file['name'];
               $mimetype=$file['type'];


    if($mimetype=="image/jpg" || $mimetype=="image/jpeg" || $mimetype=="image/jpng" || $mimetype=="image/git" ){

               
            if(!is_dir('uploads/images')){
                    mkdir('uploads/images',0777,true);
                }
                $producto->setImagen($filename);
                move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                
            }
        }

        if(isset($_GET['idProducto'])){
            $idProducto=$_GET['idProducto'];
            $producto->setIdProducto($idProducto);
     $save=$producto->edit();
        }else{
            $save=$producto->save();
        }

              

               if($save){ 
                   $_SESSION['producto']="complete";
               }else{
                $_SESSION['producto']="failed";
               }
           }else{
            $_SESSION['producto']="failed"; 
           }
        }else{
            $_SESSION['producto']="failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['idProducto'])){
        $edit=true;
        $idProducto=$_GET['idProducto'];
        $producto=new Producto();
        $producto->setIdProducto($idProducto);
        $pro= $producto->getOne();

        require_once 'views/producto/crear.php';

        }else{
            header("Location:".base_url."producto/gestion");
        }
        
    }

    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['idProducto'])){
            $idProducto=$_GET['idProducto'];
            $producto = new Producto();
            $producto->setIdProducto($idProducto);
            
            $delete=$producto->delete();
            if($delete){
                $_SESSION['delete']="complete";
            }else{
                $_SESSION['delete']="failed";
            }


        }else{
            $_SESSION['delete']="failed";
        }
        header("Location:".base_url."producto/gestion");
    }

 public function reportes(){
       
}
}