<?php
    $id_product = $_GET['id_product'];
    
    if ((int)$id_product != 0) {
        $deleteCatalog = "DELETE FROM `catalog` WHERE id = $id_product";
        $deleteImage = "DELETE FROM `galary` WHERE id_product = $id_product";
        if(requestInDataBase($deleteCatalog) && requestInDataBase($deleteImage))
        {
            echo "<script>alert('Вы успешно удалили данный товар!');</script>"; 
            exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
        }
        else
        {
            echo "<script>alert('Ошибка, удалить не вощможно!');</script>";
            exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
        }
    }
    else
    {
        exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
    }
