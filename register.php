<?php 
include("functions/c_main.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["password"] == $_POST["repeat_pass"]) {
            if (c_register($_POST["username"], $_POST["email"], $_POST["password"])) {
                echo "success!!";
                header("Location: login.php");
            } elseif(c_response::$c_register == "email_already_taken") {
                echo "email already taken"; exit();
            }
            elseif(c_response::$c_register == "username_already_taken"){
                echo "user already taken"; exit();
            }
            elseif(c_response::$c_register == "empty_data"){
                echo "empty data";
            }
        }
        else{
            echo "repeated password is wrong"; exit();
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
		<label>Repeat Pass</label>
		<br>
        <input type="text" name="repeat_pass">
        <br>
        <button>register</button>
    </form>
</body>
</html>
