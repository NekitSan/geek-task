<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if($_POST['name'] != "" && $_POST['branch'] != "" && $_POST['price'] != "")
    {
        $imageInfo = breakingImage($_FILES['image']['name'], $_FILES['image']['type']);

        echo uploadImage($imageInfo) == 1 ? "" : uploadImage($imageInfo); // Проверка картинки
        if(uploadImage($imageInfo) == true)
        {
            // Загрузка файла на сервер
            move_uploaded_file($_FILES['image']['tmp_name'], "../" . $imageInfo['url'] . $imageInfo['name'] . "." . $imageInfo['type']);

            // Базовое форматирование полученных данных
            $nameProduct = processingLines($_POST['name']);
            $nameBranchProduct = processingLines($_POST['branch'] );
            $priceProduct = processingLines($_POST['price']);
            
            // Товар
            $insertProduct = "INSERT INTO `catalog` (`name`, `price`) VALUES ('$nameProduct', '$priceProduct')";
            requestInDataBase($insertProduct);
            $id_product = mysqli_insert_id($connect);
            
            // Бренд + тест на схожие
            $selBranch = "SELECT DISTINCT `id`, `branch_name` FROM `branch`";
            $selBranch_req = requestInDataBase($selBranch);
            $tmpArr = [];
            
            while($selBranch_row = mysqli_fetch_array($selBranch_req))
            {
                if($selBranch_row['branch_name'] != $nameBranchProduct)
                    array_push($tmpArr, 1);
                else
                {
                    array_push($tmpArr, 0);
                    $id_branch = $selBranch_row['id'];
                }
            }

            if(!in_array(0, $tmpArr))
            {
                $insertBranch = "INSERT INTO `branch` (`branch_name`) VALUES ('$nameBranchProduct')";
                requestInDataBase($insertBranch);
                $id_branch = mysqli_insert_id($connect);
            }

            // Добавляем id Бренда
            $updProduct = "UPDATE `catalog` SET branch_id = $id_branch WHERE id = $id_product";
            requestInDataBase($updProduct);

            // Картинка

            $insertGalary = "INSERT INTO `galary` (`image_name`, `type`, `url`, `id_product`) VALUES ('" . $imageInfo['name'] . "', '" . $imageInfo['type'] . "', '" . $imageInfo['url'] . "', '$id_product')";
            requestInDataBase($insertGalary);

            echo echoScript("Вы добавили новый товар!");
        }
    }
    else
    {   
        echo echoScript("Невозможно добавить товар. Поля пустые!");
    }
}
?>

<form class="form" enctype="multipart/form-data" action="admin-panel.php?page=admin-panel--add" method="POST">
    <h2>Форма добавление товара</h2>
    <label class="form__item">
        <span>Название товара: </span>
        <input name="name" type="text">
    </label>
    <label class="form__item">
        <span>Название бренда товара: </span>
        <input name="branch" id="branch" type="text">
    </label>
    <label class="form__item">
        <span>Ценник товара: </span>
        <input name="price" step="0.01" type="number"> руб.
    </label>
    <div class="form__item">
        <span>Фото товара: </span>
        <input name="image" type="file">
    </div>
    <input class="form--button" type="submit" value="Добавить товар">
</form>