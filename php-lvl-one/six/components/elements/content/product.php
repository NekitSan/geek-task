<?php
$id_product = $_GET['id'];
if ($id_product != null && (int)$id_product != 0) {
    $product = "SELECT *
        FROM catalog
        INNER JOIN branch
        ON catalog.branch_id=branch.id
        INNER JOIN galary
        ON galary.id_product=catalog.id
        wHERE catalog.id = $id_product";

    $product_req = requestInDataBase($product);
    $product_row = mysqli_fetch_array($product_req);

    $view = $product_row['views'] + 1;

    $updCatalog = "UPDATE `catalog` SET views = $view WHERE id = $id_product";
    requestInDataBase($updCatalog);
} else
    exit("<meta http-equiv='refresh' content='0; url= catalog.php'>");
?>

<div class="tovar">
    <h1 class="tovar__title">Купить - <span><?php echo $product_row['name']; ?></span></h1>
    <article class="tovar__description">
        <div class="tovar__image">
            <img src="<?php echo $product_row['url'] . $product_row['image_name'] . "." . $product_row['type']; ?>" alt="<?php echo $product_row['name']; ?>">
        </div>
        <div class="tovar__info">
            <div class="tovar__branch">Марка\Бренд: <span><?php echo $product_row['branch_name'] ?></span></div>
            <div class="tovar__price">Цена товара: <span><?php echo $product_row['price'] ?></span> рублей</div>
            <div class="tovar__views">Уже просмотрели наш товар: <span><?php echo $view ?></span> человек</div>
            <a href="#" onclick="alert('В данный момент, покупка запрещена!');" class="tovar--button">Заказать</a>
        </div>
    </article>
</div>

<div class="tovars__popular">
    <h2 class="tovars__popular__title">Популярные сейчас</h2>
    <div class="popular__list">

    <?php
    $popular = "SELECT *
        FROM catalog
        INNER JOIN galary
        ON galary.id_product=catalog.id
        wHERE catalog.views > 0 LIMIT 3";
    $popular_req = requestInDataBase($popular);

    while($popular_row = mysqli_fetch_array($popular_req))
    {
        echo "<a href='product.php?id=" . $popular_row['id'] . "&nametovar=" . $popular_row['name'] . "' class='popular__list_item'>
        <img src='" . $popular_row['url'] . $popular_row['image_name'] . "." . $popular_row['type'] . "' alr='Популярная картинка (Просмотров: " . $popular_row['name'] . ")'>
        </a>";
    }  
     ?>
    </div>
</div>