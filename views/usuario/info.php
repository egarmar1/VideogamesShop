<form action="<?=base_url?>usuario/update" method="POST" enctype="multipart/form-data">
    <?php if (isset($_SESSION['update']) && $_SESSION['update']=='completed'): ?>
    
    <strong class="alert_green">Update completed succesfully</strong>
    <?php elseif(isset($_SESSION['update'])) : ?>
    <strong class="alert_red"><?=$_SESSION['update']?></strong>
    
    <?php endif;?>
    
    
     <input type="hidden" name="update" value="update">
     
    <label for="name">Name</label>
    <input type="text" name="name" value="<?=$user->nombre?>" required/>

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" value="<?=$user->apellidos?>" required/>

    <label for="email">Email</label>
    <input type="email" name="email"  value="<?=$user->email?>" required/>

    <label for="image">Profile picture</label>
    <input type="file" name="image" value="<?=base_url?>uploads/images/<?=$user->imagen?>"/>

    <img class='profileFoto' src="<?=base_url?>uploads/images/<?=$user->imagen?>" alt="Profile picture">
    
    <input type="submit" value="Update"/>
    
     <?php Utils::deleteSession('update'); ?>
</form>