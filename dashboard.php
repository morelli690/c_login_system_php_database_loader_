<?php
if(isset($_COOKIE["username"])){
    echo 'loggedin';
	echo "if you wanna log out, ";
	echo "<a href=kaboom.php>click here </a>";
}
else
    echo "ur dumb";
?>
