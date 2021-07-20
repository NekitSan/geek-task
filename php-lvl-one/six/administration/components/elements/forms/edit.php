<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Базовое форматирование полученных данных
        $idProduct = processingLines($_POST['id_product']);
        $nameProduct = processingLines($_POST['name']);
        $idBranchProduct = processingLines($_POST['branch_id']);
        $nameBranchProduct = processingLines($_POST['branch'] );
        $priceProduct = processingLines($_POST['price']);

        if($nameProduct != "" && $nameBranchProduct != "" && $priceProduct != "")
        {
            // Картинка
            if($_FILES['image']['name'] != "" )
            {
                $imageInfo = breakingImage($_FILES['image']['name'], $_FILES['image']['type']);
                $updGalary = "UPDATE `galary`
                SET `image_name`='{$imageInfo['name']}', `type`='{$imageInfo['type']}'
                WHERE id_product = $idProduct";
                insertInDataBase($updGalary);
            }

            // Бренд\Марка
            $selBranch = "SELECT DISTINCT `branch_name` FROM `branch`";
            $selBranch_req = requestInDataBase($selBranch);
            $tmpArr = [];

            while($selBranch_row = mysqli_fetch_array($selBranch_req))
            {
                if($selBranch_row['branch_name'] != $nameBranchProduct)
                {
                    array_push($tmpArr, 1);
                }
                else
                {
                    array_push($tmpArr, 0);
                }
            }

            if(!in_array(0, $tmpArr))
            {
                $insertBranch = "INSERT INTO `branch` (`branch_name`) VALUES ('" . $nameBranchProduct . "')";
                insertInDataBase($insertBranch);
                $id_branch = mysqli_insert_id($connect);
                $idBranchProduct = $id_branch;
            }

            // Товар
            $updProduct = "UPDATE `catalog` 
            SET `name` = '$nameProduct', 
            `branch_id` = '$idBranchProduct', 
            `price` = '$priceProduct' 
            WHERE `id` = '$idProduct'";
            insertInDataBase($updProduct);

            exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
        }
    }
    if((int)processingLines($_GET['id_product']) != 0)
    {
        echo (int)$_GET['id_product'];

        $product = "SELECT *
        FROM catalog
        INNER JOIN branch
        ON catalog.branch_id=branch.id
        INNER JOIN galary
        ON galary.id_product=catalog.id
        wHERE catalog.id = {$_GET['id_product']}";
        
        $product_req = requestInDataBase($product);
        $product_row = mysqli_fetch_array($product_req);
    }
    if((int)processingLines($_GET['id_product']) == 0)
        exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
    
?>
<form class="form" enctype="multipart/form-data" action="admin-panel.php?page=admin-panel--edit" method="POST">
    <h2>Форма изменение данных товара</h2>
    <div class="form__item--id">
        <span>id: </span>
        <div class="form__item--field_id"><?php echo $product_row['id']?></div>
        <input name="id_product" type="hidden" value="<?php echo $product_row['id']?>">
    </div>
    <label class="form__item">
        <span>Название товара: </span>
        <input name="name" type="text" value="<?php echo $product_row['name']?>">
    </label>
    <label class="form__item">
        <span>Название бренда товара: </span>
        <input name="branch" type="text" value="<?php echo $product_row['branch_name']?>">
        <input name="branch_id" type="hidden" value="<?php echo $product_row['branch_id']?>">
    </label>
    <label class="form__item">
        <span>Ценник товара: </span>
        <input name="price" type="text" value="<?php echo $product_row['price']?>">
    </label>
    <div class="form__item form__item--img">
        <span>Фото товара</span>
        <img src="../<?php echo $product_row['url'].$product_row['image_name'].".".$product_row['type']?>" alt="<?php echo $product_row['name']?>">
    </div>
    <div class="form__item">
        <span>Изменить фото товара: </span>
        <input name="image" type="file">
    </div>
    <input class="form--button" type="submit" value="Изменить товар">
</form>