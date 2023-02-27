<h1>Manage categories</h1>

<a href="<?=base_url?>categoria/crear" class='button button_small'>
    Create category
</a>

<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        
    </tr>
    <?php while($cat = $categorias->fetch_object()):?>
    <tr>
        <td><?=$cat->id?></td>
        <td><?=$cat->nombre?></td>
        
    </tr>
    <?php endwhile;?>
    
</table>