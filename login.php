<?php
include("functions/c_main.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    c_login($_POST["username"], $_POST["password"]);
    if($c_login_success){
        echo "success bruh";
        session_start();
        $SESSION["loggedin"] = true;
        header("Location: lmfao.php");
    }
    else{
        "i dunno"; die();
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
