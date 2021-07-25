<?php
    session_start();
    $truePass = true;
    require_once('components/index.php');
    trueLogin($_SESSION['role']);

    const SIZE_FIELD = 15;
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $login = processingLines($_POST['login']);
        $pass = $_POST['password'];

        if( $login == "" || $pass == "" )
        {
            echo echoScript("Заполните поля!!");
            exit("<meta http-equiv='refresh' content='0; url= register.php'>");
        }
        if( count( str_split( $login ) ) > SIZE_FIELD)
        {
            echo echoScript("Не более 15 символов!");
            exit("<meta http-equiv='refresh' content='0; url= register.php'>");
        }

        $result = "SELECT `id`, `login` FROM `user` WHERE `login`='$login'";
        $result_sql = requestInDataBase($result);
        $result_row = mysqli_fetch_array($result_sql);
        if (!empty($result_row['id'])) {
            echo echoScript("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
            exit("<meta http-equiv='refresh' content='0; url= register.php'>");
        }

        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $user = "INSERT INTO `user` (`login`, `password`) VALUES ('$login', '$pass')";
        requestInDataBase($user);
        echo echoScript("Вы успешно зарегистрировались!");
        exit("<meta http-equiv='refresh' content='0; url= register.php'>");
    }

?>

<?php joinContent('header', 'reg'); ?>
    <form action="register.php" method="POST">
        <input type="text" size="15" maxlength="15" name="login">
        <input type="password" name="password">
        <input type="submit" name="btn" value="Зарегистрироваться">
    </form>
<?php joinContent('footer', null); ?>