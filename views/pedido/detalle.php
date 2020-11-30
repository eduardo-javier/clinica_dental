<h1>Detalle del pedido</h1>

<?php if(isset($pedido)): ?>

    <?php if(isset($_SESSION['admin'])): ?>
    <h3>Cambiar estado del pedido</h3>

    <form action="<?=base_url?>pedido/estado" method="POST">
    <input type="hidden" value="<?=$pedido->idPedido?>"  name="idPedido">
        <select name="estado" >
            
        <option value="confirm" <?=$pedido->estado_pedido=="confirm" ? 'selected' : '';?>>Pendiente</option>
        <option value="preparation" <?=$pedido->estado_pedido=="preparation" ? 'selected' : '';?> >En preparacion</option>
        <option value="ready" <?=$pedido->estado_pedido=="ready" ? 'selected' : '';?> >Preparado para enviar</option>
        <option value="sended" <?=$pedido->estado_pedido=="sended" ? 'selected' : '';?> >Enviado</option>
    </select>
    <input type="submit" value="Cambiar estado">
    </form>
    <br>

    <?php endif; ?>

    <h3>Direccion de envio:</h3>

    Ciudad: <?=$pedido->Ciudad?> <br>
    Direccion <?=$pedido->Direccion?> <br> <br>

<h3>Datos del pedido:</h3>
Estado: <?=Utils::showStatus($pedido->estado_pedido)?> <br>
Numero de pedido: <?=$pedido->idPedido?> <br>
Total a pagar: <?=$pedido->coste?> Lps <br>
Productos:

<table>

<tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    
    </tr>

<?php while($producto=$productos->fetch_object()): ?>
    <?php if($producto->estado=='1'): ?>

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
            <?=$producto->cantidadCompra?>
        </td>
        </tr>

<?php endif; ?>
<?php endwhile; ?>
</table>
<?php endif; ?>
