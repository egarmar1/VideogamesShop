<?php if (isset($productos) && $productos): ?>

    <h1>Info order: <?= $id ?> </h1>
    <h2>General information: </h2>
    Address: <?=$ped->provincia?>,<?=$ped->localidad?>,<?=$ped->direccion?><br>
    User: <?=$user->nombre?><br>
    Email: <?=$user->email?><br>
    
    
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Units</th>

        </tr>
        <?php while ($prod = $productos->fetch_object()) : ?>
            <tr>
                <td><img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/></td>
                <td><h2><?= $prod->titulo ?></h2></td>
                <td><p><?= $prod->precio ?> $</p></td>
                <td><?= $prod->unidades?></td>
            </tr>
        <?php endwhile; ?>
        
    </table>
    <h2>Total: <?=$ped->coste ?> $</h2>
<?php else: ?>

    <h1>Invalid order</h1>
<?php endif; ?>