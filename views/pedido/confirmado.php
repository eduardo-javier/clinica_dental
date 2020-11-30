<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
<h1>Tu pedido se ha confirmado </h1>

<p>tu pedido se a guardado con exito, una vez que realices la transferencia
bancaria 727237623DBB con el coste del pedido, sera procesado y enviado.
</p>
<br>

<?php if(isset($pedido)): ?>
<h3>Datos del pedido:</h3>

Numero de pedido:<?=$pedido->idPedido?> <br>
Total a pagar:<?=$pedido->coste?> Lps <br>
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>

    <h1>Tu pedido NO se ha confirmado</h1>

<?php endif; ?>