<h1>Your shopping cart </h1>

<?php if (isset($hayCarrito) && $hayCarrito == true) : ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Units</th>
            <th>Edit</th>

        </tr>
        <?php foreach ($carrito as $key => $element): ?>

            <?php $prod = $element['producto']; ?>


            <tr>
                <td><img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/></td>
                <td><?= $prod->titulo ?></td>
                <td><?= $prod->precio ?></td>
                <td>
                <a href="<?=base_url?>carrito/restOne&key=<?=$key?>">-</a>
                <?= $element['unidades'] ?>
                <a href="<?=base_url?>carrito/sumOne&key=<?=$key?>">+</a>
                </td>

                
        </tr>

    <?php endforeach; ?>

    </table>
    <a href="<?= base_url ?>pedido/info" class="button button-compra">Buy</a> <br>
    <a href="<?= base_url ?>carrito/deleteAll" class="button button-compra">Clear out</a>
    
<?php else: ?>
    <strong>Your shopping cart is empty</strong>
<?php endif; ?>
