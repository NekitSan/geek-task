<?php
    $id_product = $_GET['id_product'];
    
    if ((int)$id_product != 0) {
        $deleteCatalog = "DELETE FROM `catalog` WHERE id = $id_product";
        $deleteImage = "DELETE FROM `galary` WHERE id_product = $id_product";
        if(requestInDataBase($deleteCatalog) && requestInDataBase($deleteImage))
        {
            echo echoScript("Позиция успешно удалена!");
            exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
        }
        else
        {
            echo echoScript("Ошибка, удаление не возможно!");
            exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
        }
    }
    if((int)$id_product == 0 && (int)$id_branch == 0)
    {
        echo echoScript("Неизвестная ошибка!");
        exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
    }