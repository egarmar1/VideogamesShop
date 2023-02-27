<h1>Create product</h1>



<form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">


    <?php if(isset($_SESSION['notSaved'])) : ?>
    <strong class="alert_red"><?=$_SESSION['notSaved']?></strong>
    
    <?php endif;?>
    

    <label for="title">Title</label>
    <input type="text" name="title" required/>

    <label for="description">Description</label>
    <textarea name="description" required></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" required/>

    <label for="stock">Stock</label>
    <input type="text" name="stock" required/>
    
   
    <?php $categorias=Utils::showCategorias()?>
    
    <label for="categoria">Category</label>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
        <?php endwhile;?>
    </select>
    
    <label for="date">Release date:</label>
    <input type="date" id="date" name="date">

    <label for="image">Product Picture</label>
    <input type="file" name="image" />

    <input type="submit" value="Save"/>

 <?php Utils::deleteSession('notSaved'); ?>


</form>