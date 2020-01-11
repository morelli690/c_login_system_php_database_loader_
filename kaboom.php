<?php
$_SESSION["loggedin"] = false;
session_destroy();  //not working for me, no idea why, if you find a fix pls push an update or open an issue
header("Location: login.php"); 