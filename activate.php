<?php
include("functions/c_main.php"); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(c_activate($_POST["username"], $_POST["key"])){
        echo "activated";
    }
    elseif(c_response::$c_activate != ""){
        echo c_response::$c_activate; exit();
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
    <label>Key</label>
    <br>
    <input type="text" name="key">
    <br>
    <button>activate</button>
</form>
</body>
</html>
