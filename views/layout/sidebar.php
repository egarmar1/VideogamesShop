
<!--SIDEBAR-->
<aside id='lateral'>
    <div id='login' class='block_aside'>
        <?php if (isset($_SESSION['error'])) : ?>
            <strong class="alert_red"><?= $_SESSION['error'] ?></strong>
        <?php endif; ?>

        <?php if (!isset($_SESSION['user'])): ?>
            <h3>Login</h3>
            <form action='<?= base_url ?>usuario/login' method='post'>
                <label for='email'>Email</label>
                <input type='email' name='email' required/>

                <label for='password'>Password</label>
                <input type='password' name='password' required/>


                <input type='submit' value="Login"/>
            </form> <br>
            <ul>
                <li><a href='<?= base_url ?>usuario/registro'>Register</a> </li>
            </ul>
        <?php else: ?>
            <h3>Welcome <?= $_SESSION['user']->nombre ?></h3>

            <ul>
                <?php if(isset($_SESSION['admin'])):?>
                <li><a href='<?=base_url?>categoria/index'>Manage categories</a></li>
                <li><a href='<?=base_url?>producto/gestion'>Manage products</a></li>
                    ------------------------------------------------------------
                    <br><br><br>
                <?php endif; ?>
                    
                    <li><a href='<?=base_url?>producto/favourites'>Favourites</a></li>
                <li><a href='<?=base_url?>carrito/index'>Shopping cart</a></li>
                <li><a href='<?=base_url?>pedido/usuario'>My orders</a></li>
                <li><a href='<?= base_url ?>usuario/close'>Logout</a></li>
            </ul>
        <?php endif; ?>

        <?php Utils::deleteSession('error') ?>
    </div>
</aside>
<!--CORE CONTENT-->
<div id='core'>