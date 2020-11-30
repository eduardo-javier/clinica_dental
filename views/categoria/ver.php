<?php if(isset($categoria)): ?>
<h1> <?=$categoria->Descripcion?> </h1>

<?php if ($productos->num_rows == 0): ?>

<p>No hay productos disponibles</p> 

<?php else: ?>
    
	<?php while($product= $productos->fetch_object()): ?>
	<?php if($product->estado=='1'): ?>
					<div class="product">
						<a href="<?=base_url?>producto/ver&idProducto=<?=$product->idProducto?>">
						<?php if($product->imagen !=null): ?>
						<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
						<?php else: ?>
							<img src="<?=base_url?>assets/img/dental.jpeg" alt="">
						<?php endif; ?>
						<h2><?=$product->Nombre?></h2>
					</a>
						<p><?=$product->precioVenta?> Lps</p>
						<a href="<?=base_url?>carrito/add&idProducto=<?=$product->idProducto?>" class="button">Comprar</a>
					</div>
					<?php endif; ?>
<?php endwhile; ?>
    
<?php endif; ?>

<?php else: ?>

<h1>categoria inexistente</h1>

<?php endif; ?>

