<?php
    session_start();
    require_once('components/index.php');
    if (!empty($_SESSION['login']) or !empty($_SESSION['id']))
    {
        $result = "SELECT `id`, `login` FROM `user` WHERE `login`='{$_SESSION['login']}'";
        $result_sql = requestInDataBase($result);
        $result_row = mysqli_fetch_array($result_sql);
        
    }
?>

<?php joinContent('header', 'tovar');
if($_SESSION['id'] != "") {?>
<a href="#">Вы вошли как <?php echo $result_row['login'];?></a>
<?php }?>
<div class="wrapper">
    <?php joinContent('product', null); ?>
</div>
<?php joinContent('footer', null); ?>