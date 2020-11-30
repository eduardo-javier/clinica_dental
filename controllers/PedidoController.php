<?php 

require_once 'models/pedido.php';

class pedidoController{
    public function hacer(){
       require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            $idUsuario=$_SESSION['identity']->idUsuario;

            $Ciudad=isset($_POST['Ciudad']) ? $_POST['Ciudad'] : false;
            $Direccion=isset($_POST['Direccion']) ? $_POST['Direccion'] : false;

            $stats=Utils::statsCarrito();
            $coste=$stats['total'];

            if($Ciudad && $Direccion){
            $pedido= new Pedido();
            $pedido->setCiudad($Ciudad);
            $pedido->setDireccion($Direccion);
            $pedido->setIdUsuario($idUsuario);
            $pedido->setCoste($coste);

            
            $save=$pedido->save();

            $save_detalle=$pedido->save_Detalle();

            if($save && $save_detalle){
                $_SESSION['pedido']="complete";
            }else{
                $_SESSION['pedido']="failed";
            }
           
            }else{
                $_SESSION['pedido']="failed";
            }

            header("Location:".base_url.'pedido/confirmado');

        }else{
            header("Location:".base_url);
        }
    }

    public function confirmado(){

        if(isset($_SESSION['identity'])){
        $identity=$_SESSION['identity'];
        $pedido= new Pedido();
        $pedido->setIdUsuario($identity->idUsuario);
        $pedido=$pedido->getOneByUser();   
        
        $pedido_productos=new Pedido();
        $productos =$pedido_productos->getProductosByPedido($pedido->idPedido);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){

        Utils::isIdentity();

        $idUsuario=$_SESSION['identity']->idUsuario;
        $pedido=new Pedido();
        $pedido->setIdUsuario($idUsuario);
        $pedidos=$pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['idPedido'])){
        $idPedido=$_GET['idPedido'];


        $pedido= new Pedido();
        $pedido->setIdPedido($idPedido);
        $pedido=$pedido->getOne();   
        
        $pedido_productos=new Pedido();
        $productos =$pedido_productos->getProductosByPedido($idPedido);

            
            require_once 'views/pedido/detalle.php';
        
        }else{
            header("Location:".base_url.'pedido/mis_pedidos');
        }
        
    }

    public function gestion(){
        Utils::isAdmin();
      
        $gestion=true;

        $pedido =new Pedido();
        $pedidos =$pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['idPedido']) && isset($_POST['estado'])){
            $idPedido=$_POST['idPedido'];
            $estado=$_POST['estado'];
            $pedido= new Pedido();
            $pedido->setIdPedido($idPedido);
            $pedido->setEstado_Pedido($estado);
            $pedido->edit();
            header('Location:'.base_url.'pedido/detalle&idPedido='.$idPedido);

        }else{
            header("Location:".base_url);
        }
    }
}