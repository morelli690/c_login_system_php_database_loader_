<?php 
include("functions/c_main.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        c_register($_POST["username"], $_POST["email"], $_POST["password"]);
        if($c_register_success){
            echo "success!!";
            header("Location: login.php");
        }
        else{
            "i dunno";
            die();
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
        <label>Email</label>
        <br>
        <input type="text" name ="email">
        <br>
        <label>Pass</label>
        <br>
        <input type="text" name="password">
        <br>
        <button>register</button>
    </form>
</body>
</html>
