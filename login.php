<?php
include("functions/c_main.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(c_login($_POST["username"], $_POST["password"])){
        session_start();
        $_SESSION["loggedin"] = true;

        header("Location: lmfao.php");
    }
    elseif(c_response::$c_login == "wrong_password") {
        echo "wrong password"; exit();
    }
    elseif(c_response::$c_login == "empty_password"){
        echo "empty password"; exit();
    }
    elseif(c_response::$c_login == "invalid_username"){
        echo "invalid username"; exit();
    }
    elseif(c_response::$c_login == "empty_username"){
        echo "empty username"; exit();
    }
    else{
        echo "unknown error"; exit();
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
    <input type="text" name="password">
    <br>
    <button>login</button>
</form>
</body>
</html>
