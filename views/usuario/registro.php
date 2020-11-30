<h1>Registro</h1>

<?php 

if(isset($_SESSION['register']) && $_SESSION['register'] =='complete'):
?>

    <strong class="alert_green">Registro completado exitosamente</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] =='failed'):
    ?>

    <strong class="alert_red">Registro fallido</strong>


<?php  endif; 
?>

<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="post">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" required><br>

<label for="apellido">Apellido</label>
<input type="text" name="apellido" required><br>

<label for="email">Correo electronico</label>
<input type="text" name="email" required><br>

<label for="password">Contraseña</label>
<input type="password" name="password" required><br>


<label for="telefono">Telefono</label>
<input type="number" name="telefono" required><br>

<label for="edad">Edad</label>
<input type="number" name="edad" required><br>

<label for="idTipo">Tipo de Usuario</label>
<?php $tipos= Utils::showUsuarios();?>
<select name="idTipo" >
<?php while($tip=$tipos->fetch_object()):?>
<option value="<?=$tip->idTipo ?>">
<?=$tip->Descripcion?>
</option>
<?php endwhile; ?>
</select> <br>



<input type="submit" value="Registrarse">

</form>