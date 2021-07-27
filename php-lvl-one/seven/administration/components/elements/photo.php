<?php
$id_image = $_GET['id_image'];

if ($id_image != null && (int)$id_image != 0 && $id_image > 0) {

    $image = "SELECT *
        FROM `galary`
        wHERE id = $id_image";

    $image_req = requestInDataBase($image);
    $image_row = mysqli_fetch_array($image_req);
    if($image_row == null)
    {
        echo echoScript("Отсутствует фотография");
        exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
    }
} else
{
    echo echoScript("Неизветная ошибка!");
    exit("<meta http-equiv='refresh' content='0; url= admin-panel.php'>");
}
?>

<div class="gallary">
    <div class="panel--fixed gallary__panel">
        <h2 class="gallary__title">Фото-галерея</h2>
        <div class="gallary__buttens">
            <a href="admin-panel.php?page=admin-panel--photo&id_image=<?php echo $id_image - 1;?>" class="gallary__buttens--left">Left</a>
            <a href="admin-panel.php?page=admin-panel--photo&id_image=<?php echo $id_image + 1;?>" class="gallary__buttens--right">Right</a>
        </div>
    </div>
    <div class="gallary__image">
        <img src="../<?php echo $image_row['url'] . $image_row['image_name'] . "." . $image_row['type']; ?>" alt="<?php echo $image_row['image_name']; ?>">
    </div>
</div>