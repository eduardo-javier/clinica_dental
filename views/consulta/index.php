
<?php if(isset($_SESSION['identity'])): ?>
<h1>Añade tu consulta</h1>

<?php if(isset($_SESSION['consulta']) && $_SESSION['consulta'] =='complete'):
?>

    <strong class="alert_green">consulta completada exitosamente</strong>

<?php elseif(isset($_SESSION['consulta']) && $_SESSION['consulta'] =='failed'):
    ?>

    <strong class="alert_red">consulta fallida</strong>


<?php  endif; 
?>
<?php Utils::deleteSession('consulta'); ?>

<form action="<?=base_url?>consulta/save" method="POST">
<label for="descripcion">Describa su problema</label>
<textarea name="descripcion"></textarea>

<input type="submit" value="Enviar">

</form>

<?php endif; ?>