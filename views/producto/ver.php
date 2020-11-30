<?php if(isset($product)): ?>
<h1> <?=$product->Nombre?> </h1>
				<div id="detail-product">
                    <div class="image">
						<?php if($product->imagen !=null): ?>
						<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
						<?php else: ?>
							<img src="<?=base_url?>assets/img/dental.jpeg" alt="">
						<?php endif; ?>
                        </div>
                        <div class="data">
						<p class="price"><?=$product->precioVenta?>Lps</p>
      <a href="<?=base_url?>carrito/add&idProducto=<?=$product->idProducto?>" class="button">Comprar</a>
                    </div>
					</div>
					

<?php else: ?>

<h1>producto inexistente</h1>

<?php endif; ?>