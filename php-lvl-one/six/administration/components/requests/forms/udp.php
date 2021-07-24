<?php

if($_FILES['image']['name'] == "" )
    return $updProduct = "UPDATE `catalog`
    SET name = {$_POST['name']}, price = {$_POST['price']}
    WHERE id = {$_GET['id_product']}";
else
{
    echo 1;
}

    exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
    insertInDataBase($updProduct);