<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <meta charset="utf-8" />
</head>
<body>
    <form method="POST">
        Логин: <input type="text" name="login" required/>
        Пароль: <input type="password" name="password" required/>
        <input type="submit" value="Войти" name="log_in" />
    </form>
</body>
</html>

<?php
$login = "не определен";
$password = "не определен";

if(isset($_POST["login"]) && isset($_POST["password"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    setcookie("login", $login, time()+60*60*24*30, "/");
    setcookie("password", $password, time()+60*60*24*30, "/");
}

?>