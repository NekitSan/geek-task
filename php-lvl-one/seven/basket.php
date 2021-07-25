<?php
session_start();
$truePass = true;
require_once('components/index.php');
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}
addTocartAction();

joinContent('header', null); 
if($_SESSION['count'] == null)
{
    echo "<h2>Корзина пуста</h2>
        <div>Добавте товары в корзину. <a href='catalog.php' style='color: skyblue;'>Добавить</a></div>";
}
else
{
    $stritemId = implode(", ", $_SESSION['cart']);
    $cart = "SELECT * FROM catalog 
    INNER JOIN branch
    ON catalog.branch_id=branch.id
    INNER JOIN galary
    ON galary.id_product=catalog.id
    WHERE catalog.id in ($stritemId)";
    $cart_req = requestInDataBase($cart);

    echo "<h1>Корзина</h1>
    <h5 class='count'>Всего в корзине товаров {$_SESSION['count']} шт.</h5><br>
    <div class='order'>";
    
    while($cart_row = mysqli_fetch_array($cart_req))
    {
        echo "<div class='order__item'>
            <div>Название: " . $cart_row['name'] . "</div>
            <div>Бренд: " . $cart_row['branch_name'] . "</div>
            <div>Цена: " . $cart_row['price'] . "</div>
            <div><img class='order__image' src='" . $cart_row['url'] . $cart_row['image_name'] . "." . $cart_row['type'] . "' alr='" . $cart_row['name'] . "'></div>
        </div>";
    }
        
    echo "</div>
    <div>Вы можете приобрести товар или <a href='catalog.php'style='color: skyblue;'>продолжить покупки.</a></div>";
}
joinContent('footer', null); 
?>