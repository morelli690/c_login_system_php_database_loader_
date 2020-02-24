<?php
session_start();
include("functions/c_main.php");
if(isset($_SESSION["username"]) && isset($_SESSION["access"]) && $_SESSION["access"] == md5(c_security::openssl_crypto(c_security::get_ip()))){ ?>
    hello <?php echo c_security::openssl_decrypto($_SESSION["username"]); ?>
	if you wanna log out
	<a href=kaboom.php>click here </a>
	<br><br>
	want to change your pass? :
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
    if(c_change_pass(c_security::openssl_decrypto($_SESSION["username"]), $_POST["old_password"], $_POST["new_password"])){
    	echo "well done";
    }
    else{
        echo c_response::$c_reset; exit();
    }
}?>


