<?php if(isset($_SESSION['identity'])): ?>
<h1>Hacer pedido</h1>
<a href="<?=base_url?>/carrito/index">Ver los productos y el precio del pedido</a><br><br>

<p>

<h3>Direccion para el envio</h3>

</p> <br>

<form action="<?=base_url.'pedido/add'?>" method="post">

<label for="Ciudad">Ingrese su Ciudad: </label>
<input type="text" name="Ciudad" required>

<label for="Dirrecion">Ingrese su Direccion: </label>
<input type="text" name="Direccion" required>

<input type="submit" value="confirmar pedido">

</form>

<?php else: ?>

    <h1>necesitas estar indentificado</h1>

    <p>necesitas estar logueado para realizar un pedido.</p>

<?php endif; ?>