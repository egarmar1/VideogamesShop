<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Videogame shop</title>
        <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css"
              <title></title>
    </head>
    <body>
        <div id="container">
            <!-- HEADER -->
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/logo.png" alt='Imagen logo'/>
                    <a href='#'>Videogame shop</a>
                </div>
            </header>

            <!--MENU-->
            <?php $categorias = Utils::showCategorias() ?>
            
            <nav id='menu'>
                <ul>
                    <li>
                        <a href=<?= base_url ?>>Home</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()) : ?>
                        <li>
                            <a href='<?=base_url?>categoria/ver&id=<?=$cat->id?>'><?= $cat->nombre ?></a>
                        </li>

                    <?php endwhile; ?>
                </ul>

            </nav>
            <div id='content'>