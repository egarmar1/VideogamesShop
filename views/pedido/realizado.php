

<?php if(isset($saved) && $saved) : ?>
<h1>Your order has been successfully processed</h1>
<strong>Your order with the id: <?=$id?> was ordered succesfully, in a few days will be sent to your home</strong>
<?php Utils::deleteSession('carrito')?>
<?php else: ?>
<h1>There was an error trying to process your order</h1>
<?php endif; ?>