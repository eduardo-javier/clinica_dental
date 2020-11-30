<h1>Gestion de Productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<a href="<?=base_url?>producto/reportes" class="button button-small">Generar reportes</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=='complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong><br>

    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']!='complete'): ?>
        <strong class="alert_red">El producto no se ha creado correctamente</strong><br>
<?php endif; ?>
<?php Utils::deleteSession('producto');?>
<table>
<tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO DE COMPRA</th>
        <th>PRECIO DE VENTA</th>
        <th>CANTIDAD</th>
        <th>ACCIONES</th>
    <tr>
<?php while($pro = $productos->fetch_object()): ?>

    <?php if($pro->estado=='1'): ?>
    
    <tr>
        <td> <?=$pro->idProducto;?></td>
        <td> <?=$pro->Nombre;?></td>
        <td> <?=$pro->precioCompra;?></td>
        <td> <?=$pro->precioVenta;?></td>
        <td> <?=$pro->stock;?></td>

        <td> <a href="<?=base_url?>producto/editar&idProducto=<?=$pro->idProducto?>" class="button button-gestion">Editar</a> 
    

          <a href="<?=base_url?>producto/eliminar&idProducto=<?=$pro->idProducto?>" class="button button-gestion button-red">Eliminar</a> 
        </td>
    <tr>
    <?php endif; ?>
<?php endwhile; ?>

<table/>