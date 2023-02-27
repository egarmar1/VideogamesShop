<h1>Your orders:</h1>
<?php if ($pedidos != null):?>
<table>
    <tr>
        <th>Id</th>
        <th>Address</th>
        <th>Cost</th>
        <th>Status</th>
        

    </tr>
    <?php while ($pedido = $pedidos->fetch_object()): ?>
        <tr>
        <td><a href="<?=base_url?>pedido/verUno&id=<?=$pedido->id?>"><?= $pedido->id ?></a></td>
            <td><?= $pedido->direccion ?></td>
            <td><?= $pedido->coste ?> $</td>
            <td><?= $pedido->estado ?></td>
            

        </tr>
    <?php endwhile; ?>
</table>
<?php else:?>
<strong>You have no orders </strong>
<?php endif; ?>
