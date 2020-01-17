<?php
include("functions/c_main.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(c_login($_POST["username"], $_POST["password"])){
        setcookie("username", $_POST["username"], time()+ 1337,'/');

        header("Location: lmfao.php");
    }
    else{
        echo c_response::$c_login; exit();
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
