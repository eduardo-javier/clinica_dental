<?php if(isset($gestion)):?>

    <h1>Gestionar Pedidos</h1>

<?php else:; ?>    


<h1>Mis pedidos</h1>
<?php endif; ?>
<table class="">

    <tr>
    <th>N° Pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
    <th>Estado</th>
      
    </tr>
    <?php 
    while($ped= $pedidos->fetch_object()):
        ?>

        <tr>
        <td>
         <a href="<?=base_url?>pedido/detalle&idPedido=<?=$ped->idPedido?>">  <?=$ped->idPedido?></a> 

        </td>

        <td>
        <?=$ped->coste ?> Lps
        </td>

        <td>
        <?=$ped->fecha ?>
        </td>

        <td>
        <?=Utils::showStatus($ped->estado_pedido)?>
        </td>

        </tr>

                        <?php endwhile; ?>
</table>

