
<h1>Some of our games</h1>

<?php while ($prod = $products->fetch_object()): ?>
    <div class="product">
        <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>" >
            <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/>
            <h2><?= $prod->titulo ?></h2>
            <p><?= $prod->precio ?> $</p>
            <a href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>" class="button">Buy</a>
           
            <a href="<?= base_url ?>producto/addFavourite&id=<?= $prod->id ?>" class="button button-favourite">Add to favourites</a>
            
        </a>
    </div>

<?php endwhile; ?>


