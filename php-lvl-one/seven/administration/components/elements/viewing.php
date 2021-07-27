<?php
$id_product = $_GET['id_product'];
if ($id_product != null) {
    $product = "SELECT *
        FROM catalog
        INNER JOIN branch
        ON catalog.branch_id=branch.id
        INNER JOIN galary
        ON galary.id_product=catalog.id
        wHERE catalog.id = $id_product";

    $product_req = requestInDataBase($product);
    $product_row = mysqli_fetch_array($product_req);
} 
else
{
    echo echoScript("Неизветная ошибка!");
    exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
}
?>

<div class="tovar">
    <h1 class="tovar__title">Купить - <span><?php echo $product_row['name']; ?></span></h1>
    <article class="tovar__description">
        <div class="tovar__image">
            <a href="admin-panel.php?page=admin-panel--photo&id_image=<?php echo $product_row[7];?>">    
                <img src="../<?php echo $product_row['url'] . $product_row['image_name'] . "." . $product_row['type']; ?>" alt="<?php echo $product_row['name']; ?>">
            </a>
        </div>
        <div class="tovar__info">
            <div class="tovar__branch">Марка\Бренд: <span><?php echo $product_row['branch_name']; ?></span></div>
            <div class="tovar__price">Цена товара: <span><?php echo $product_row['price']; ?></span> рублей</div>
            <div class="tovar__views">Просмотров товара: <span><?php echo $product_row['views']; ?></span> человек</div>
            <a href="admin-panel.php" class="tovar--button">Назад</a>
        </div>
    </article>

    <h2 class="tovar__title">Фото целиком</h2>
    <div class="tovar__full_img">
        <img src="../<?php echo $product_row['url'] . $product_row['image_name'] . "." . $product_row['type']; ?>" alt="<?php echo $product_row['name']; ?>">
    </div>
</div>