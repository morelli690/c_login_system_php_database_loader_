<?php
include("functions/c_main.php");
if(isset($_COOKIE["username"])){ ?>
    loggedin
	if you wanna log out
	<a href=kaboom.php>click here </a>
	<br>
    <br>
	wanna change pass? :
	<form action="" method="post">
    	<label>Old Pass</label>
    	<br>
    	<input type="text" name="old_password">
    	<br>
    	<label>New Pass</label>
    	<br>
    	<input type="text" name="new_password">
    	<br>
    	<button>change</button>
		</form>
<?php }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(c_change_pass($_COOKIE["username"], $_POST["old_password"], $_POST["new_password"])){
    	echo "well done";
    }
    else{
        echo c_response::$c_reset; exit();
    }
}?>


