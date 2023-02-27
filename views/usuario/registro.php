<h1>Register</h1>



<form action="<?= base_url ?>usuario/save" method="post" enctype="multipart/form-data">


    
    <?php if (isset($_SESSION['register']) && $_SESSION['register']=='completed'): ?>
    
    <strong class="alert_green">Register completed succesfully</strong>
    <?php elseif(isset($_SESSION['register'])) : ?>
    <strong class="alert_red"><?=$_SESSION['register']?></strong>
    
    <?php endif;?>
    

    <label for="name">Name</label>
    <input type="text" name="name" required/>

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" required/>

    <label for="email">Email</label>
    <input type="email" name="email" required/>

    <label for="password">Password</label>
    <input type="password" name="password" required/>

    <label for="image">Profile picture</label>
    <input type="file" name="image"/>

    <input type="submit" value="Register"/>

 <?php Utils::deleteSession('register'); ?>


</form>
