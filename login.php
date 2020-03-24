<?php
session_start();
include("functions/c_main.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(c_login($_POST["username"], $_POST["password"])){
        $_SESSION["username"] = c_security::openssl_crypto(strip_tags($_POST["username"])); //thanks Pured
        $_SESSION["access"] = md5(c_security::openssl_crypto(c_security::get_ip()));

        header("Location: dashboard.php");
    }
    else{
        echo c_response::$c_login;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FODA SI</title>
</head>
<body>
<form action="" method="post">
    <label>User</label>
    <br>
    <input type="text" name="username">
    <br>
    <label>Pass</label>
    <br>
    <input type="password" name="password">
    <br>
	<label> dont have an account?<label> <a href="register.php"> click here </a>
	<br>
    <button>login</button>
</form>
</body>
</html>
