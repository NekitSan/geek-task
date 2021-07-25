<?php
    session_start();
    $truePass = true;
    require_once('components/index.php');
    trueLogin($_SESSION['role']);

    if($_GET['option'] == "exit")
    {
        session_destroy();
        exit("<meta http-equiv='refresh' content='0; url= login.php'>");
    }

    const SIZE_FIELD = 15;
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $login = processingLines($_POST['login']);
        $pass = $_POST['password'];

        if( $login == "" || $pass == "" )
        {
            echo echoScript("Заполните поля!!");
            exit("<meta http-equiv='refresh' content='0; url= login.php'>");
        }
        if( count( str_split( $login ) ) > SIZE_FIELD)
        {
            echo echoScript("Не более 15 символов!");
            exit("<meta http-equiv='refresh' content='0; url= login.php'>");
        }

        $result = "SELECT * FROM `user` WHERE `login`='$login'";
        $result_sql = requestInDataBase($result);
        $result_row = mysqli_fetch_array($result_sql);

        if ( !password_verify($pass, $result_row['password']) )
        {
            echo echoScript("Извините, введённый вами login или пароль неверный.");
            exit("<meta http-equiv='refresh' content='0; url= login.php'>");
        }

        $_SESSION['id'] = $result_row['id'];
        $_SESSION['login'] = $result_row['login']; 
        $_SESSION['role'] = $result_row['role'];
        echo echoScript("Вход успешно выполнен! Вы вошли как {$_SESSION['login']}");
        exit("<meta http-equiv='refresh' content='0; url= catalog.php'>");
    }
?>


<?php joinContent('header', 'log'); ?>
    <h1>Войти</h1>
    <form action="login.php" method="POST">
        <p>
            <label>Ваш логин:<br></label>
            <input type="text" size="15" maxlength="15" name="login">
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input type="password" name="password">
        </p>
        <input type="submit" name="log_in" value="Войти">
        <br>
        <a href="register.php">Зарегистрироваться</a> 
    </form>
<?php joinContent('footer', null); ?>