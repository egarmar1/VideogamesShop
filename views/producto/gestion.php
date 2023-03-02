<h1>Manage products</h1>

<a href="<?=base_url?>producto/crear" class='button button_small'>
    Create product
</a>


<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Precio</th>
        <th>Stock</th>
        
        
    </tr>
    <?php while($prod = $productos->fetch_object()):?>
    <tr>
        <td><?=$prod->id?></td>
        <td><?=$prod->titulo?></td>
        <td><?=$prod->precio?></td>
        <td>
        <a href="<?=base_url?>producto/restStock&id=<?=$prod->id?>">-</a>
                <?=$prod->stock?>
                <a href="<?=base_url?>producto/sumStock&id=<?=$prod->id?>">+</a>
        
        
        </td>
        
        
    </tr>
    <?php endwhile;?>
    
</table>