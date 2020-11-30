

<h1>Carrito de compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >=1): ?>

<table class="">

    <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
    
    </tr>
    <?php 
    foreach($carrito as $indice => $elemento): 
        $producto=$elemento['producto'];
        ?>

        <tr>
        <td>
            <?php if($producto->imagen !=null): ?>
						<img src="<?=base_url?>uploads/images/<?=$producto->imagen?>"  class="img_carrito"/>
						<?php else: ?>
							<img src="<?=base_url?>assets/img/dental.jpeg" class="img_carrito">
						<?php endif; ?>
        </td>

        <td>
         <a href="<?= base_url ?>producto/ver&idProducto=<?=$producto->idProducto?>"><?=$producto->Nombre?></a>
        </td>

        <td>
            <?=$producto->precioVenta?>
        </td>

        <td>
            <?=$elemento['unidades']?>
        </td>

        <td>
        <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Eliminar Producto</a>
        </td>
        </tr>

    <?php endforeach; ?>
</table>
<br>
<div class="delete-carrito">
 <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>

<div class="total-carrito">
<?php $stats= Utils::statsCarrito(); ?>
<h3>Total: <?=$stats['total']?> Lps</h3>
<a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>

              <?php else: ?>
                <p>El carrito esta vacio, si quieres puedes comenzar a añadir productos a tu compra</p>

<?php endif; ?>