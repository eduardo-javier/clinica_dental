<h1>Algunos de nuestros productos</h1>

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


				</div>
			</div>