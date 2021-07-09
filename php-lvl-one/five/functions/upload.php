<?php
    const DIRECTORY = "assets/images/";

    function uploadImage($connect)
    {
        if( !isset($_FILES['userimage']['name']) )
        {
            return "<script>alert('Файл не найден!');</script>";
        }
        if( !preg_filter("/image/", "", $_FILES['userimage']['type']) )
        {
            return "<script>alert('Файл не является изображением!');</script>";
        }
        if( ($_FILES['userimage']['size'] / 1048576) > 4.0 )
        {
            return "<script>alert('Файл слишком большой!');</script>";
        }
        if( $_FILES['userimage']['error'] !== 0 )
        {
            return "<script>alert('Ошибка при загрузке изображения!');</script>";
        }
        if ( move_uploaded_file($_FILES['userimage']['tmp_name'], DIRECTORY . $_FILES['userimage']['name']) && uploadDB($connect, $_FILES['userimage']['name'])) {
            return;
        }

        return "<script>alert('Не получилось сохранить изображение!');</script>";
    
    }

    function uploadDB($connect, $filename)
    {
        $sql = "INSERT INTO `galary` (name, URL) VALUE ('$filename', '" . DIRECTORY . "')";
        
        if (!mysqli_query($connect, $sql))
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        else
            return true;
    }

    function outputImages($connect)
    {
        $sql = "SELECT * FROM `galary`";

        $output_sql = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_array($output_sql)) {
            echo "<a href=preview.php?id=" . $row['id'] . " class='image'><img src=" . $row['URL'] . $row['name'] . " alt='Картинка для галереи'></a>";
        }
        
    }
?>