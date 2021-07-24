<?php
$catalog = "SELECT *
FROM catalog
INNER JOIN branch
ON catalog.branch_id=branch.id
INNER JOIN galary
ON galary.id_product=catalog.id";

$catalog_req = requestInDataBase($catalog);

echo "<table>
    <tr class='tr__title'>
        <td>id - товара</td>
        <td>Название - товара</td>
        <td>Бренд - товара</td>
        <td>Цена - товара</td>
        <td>Просмотры - товара</td>
        <td>Картинка - товара</td>
        <td>image_type</td>
        <td>image_url</td>
        <td>Изменить</td>
        <td>Удалить</td>
        <td>Просмотр</td>
    </tr>";
while ($catalog_row = mysqli_fetch_array($catalog_req)) {
    echo "
    <tr>
        <td>{$catalog_row['id']}</td>
        " . abbreiatTxtAddTeg($catalog_row['name']) . "
        " . abbreiatTxtAddTeg($catalog_row['branch_name']) . "
        
        <td>" . number_format($catalog_row['price'], 2, '.', ' ') . "</td>
        <td>{$catalog_row['views']}</td>
        " . abbreiatTxtAddTeg($catalog_row['image_name']) . "
        " . abbreiatTxtAddTeg($catalog_row['type']) . "
        " . abbreiatTxtAddTeg($catalog_row['url']) . "
        <td class='td__link--edit'>
            <a href='admin-panel.php?page=admin-panel--edit&id_product={$catalog_row['id']}'>Изменить</a>
        </td>
        <td class='td__link--dell'>
            <a href='#' data-id='{$catalog_row['id']}'>Удалить</a>
        </td>
        <td class='td__link--next'>
            <a href='admin-panel.php?page=admin-panel--tovar&id_product={$catalog_row['id']}'>Перейти</a>
        </td>
    </tr>";
}
echo "</table><div class='pop_up'></div>";


