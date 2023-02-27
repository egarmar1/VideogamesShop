<?php if(isset($prod) && $prod !=null): ?>
    <h1><?=$prod->titulo?></h1>

    <div id="detail-product">
        <div class="image">
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/>
        </div>
        <div class="data">
            <h2><?= $prod->descripcion ?></h2>
            <p><?= $prod->precio ?></p>
            <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else:?>
    <h1>Unknown product</h1>
<?php endif; ?>


