
<h1>Gestionar Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>

<table>
<tr>
        <td>ID</td>
        <td>NOMBRE</td>
        
    
    <tr>

<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td> <?=$cat->idCategoria;?></td>
        <td> <?=$cat->Descripcion;?></td>

        
    <tr>
        
<?php endwhile; ?>
<table/>

