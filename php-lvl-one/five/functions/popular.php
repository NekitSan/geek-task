<?php
    $sqp_popular = "SELECT * FROM `galary` WHERE view > 0 LIMIT 5";
    $output_sql_popular = mysqli_query($connect, $sqp_popular);

    while($row_popular = mysqli_fetch_array($output_sql_popular))
    {
        echo "<a href='preview.php?id=" . $row_popular['id'] . "' class='popular__list_item'>
        <img src='" . $row_popular['URL'] . $row_popular['name'] . "' alr='Популярная картинка (Просмотров: " . $row_popular['view'] . ")'>
        </a>";
    } 
     
                                                    