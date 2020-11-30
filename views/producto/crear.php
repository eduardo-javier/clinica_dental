<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar Producto <?=$pro->Nombre?></h1>
<?php $url_action=base_url."producto/save&idProducto=".$pro->idProducto; ?>
<?php else: ?>
<h1>Crear Nuevo Producto</h1>
<?php $url_action=base_url."producto/save"; ?>
<?php endif; ?>

<div class="form_container">
<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">

<label for="idCategoria">Categoria</label>
<?php $categorias= Utils::showCategorias();?>
<select name="idCategoria">
<?php while($cat=$categorias->fetch_object()):?>
<option value="<?=$cat->idCategoria ?>" <?=isset($pro) && is_object($pro) && $cat->idCategoria== $pro->idCategoria ? 'selected' : '';?>>
<?=$cat->Descripcion?>
</option>
<?php endwhile; ?>
</select><br>
<label for="">Nombre</label>
<input type="text" name="Nombre" value="<?=isset($pro) && is_object($pro) ? $pro->Nombre : ''; ?>"><br>

<label for="stock">Cantidad</label>
<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"><br>

<label for="precioCompra">Precio de Compra</label>
<input type="text" name="precioCompra" value="<?=isset($pro) && is_object($pro) ? $pro->precioCompra : ''; ?>"> <br>

<label for="precioVenta">Precio de Venta</label>
<input type="text" name="precioVenta" value="<?=isset($pro) && is_object($pro) ? $pro->precioVenta : ''; ?>"><br>

<label for="imagen">Imagen</label>
<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
	<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/>
<?php endif;?>
<input type="file" name="imagen"><br>
<input type="submit" value="Guardar">
</form>

</div>