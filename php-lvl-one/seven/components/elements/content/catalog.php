<?php
$catalog = "SELECT *
FROM catalog
INNER JOIN branch
ON catalog.branch_id=branch.id
INNER JOIN galary
ON galary.id_product=catalog.id";

$catalog_req = requestInDataBase($catalog);
?>


<div class="catalog">
    <?php while($catalog_row = mysqli_fetch_array($catalog_req)) { ?>

    <div class="product">
        <div class="product__preview">
            <img src="<?php echo $catalog_row['url'].$catalog_row['image_name'].".".$catalog_row['type']?>" alt="<?php echo $catalog_row['name']?>">
        </div>
        <h2 class="product__title"><span><?php echo $catalog_row['name']?></span></h2>
        <div class="product__brach">Марка\Бренд: <span><?php echo $catalog_row['branch_name']?></span></div>
        <div class="product__brach">Количество: <span><?php echo $catalog_row['qutity']?></span></div>
        <div class="product__price">Цена товара: <span><?php echo $catalog_row['price']?></span> рублей</div>
        <a href="product.php?id=<?php echo $catalog_row['id']?>&nametovar=<?php echo $catalog_row['name']?>" class="product--button">Купить</a>
    </div>

    <?php }?>
</div>