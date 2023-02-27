<?php if (isset($new_categoria) && $new_categoria != null): ?>
    <h1><?= $new_categoria->nombre ?></h1>

    <?php if($products->num_rows > 0 ):?>
    
    <?php while ($prod = $products->fetch_object()): ?>
        <div class="product">
            <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>" >
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/>
                <h2><?= $prod->titulo ?></h2>
                <p><?= $prod->precio ?> $</p>
                <a href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>" class="button">Comprar</a>
                 <a href="<?= base_url ?>producto/addFavourite&id=<?= $prod->id ?>" class="button button-favourite">Add to favourites</a>
            </a>
        </div>

    <?php endwhile; ?>
    <?php else:?>
    <strong>No games in this category</strong>
    <?php endif;?>
<?php else: ?>

    <h1>Invalid category</h1>
<?php endif; ?>