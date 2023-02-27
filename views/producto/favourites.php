<?php if (isset($favourites)): ?>
    <h1>Your favourite games</h1>

    <?php if($favourites != null):?>
    
    <?php while ($fav= $favourites->fetch_object()): ?>
        <div class="product">

                <img src="<?= base_url ?>uploads/images/<?= $fav->imagen ?>"/>
                <h2><?= $fav->titulo ?></h2>
                <p><?= $fav->precio ?></p>
                <a href="<?= base_url ?>producto/deleteFav&id=<?= $fav->id_producto?>" class="button">Delete from Favourites</a>
        </div>

    <?php endwhile; ?>
    <?php else:?>
    <strong>No games in this category</strong>
    <?php endif;?>
<?php else: ?>

    <h1>No favourite games</h1>
<?php endif; ?>