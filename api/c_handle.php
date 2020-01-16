<?php
include ("../functions/c_main.php");

if(isset($_GET["m"])) {
    if (c_api_login($_GET["username"], $_GET["password"], $_GET["hwid"])) {
        echo c_security::encrypt(c_response::$c_api_login);
        exit();
    } else {
        echo c_security::encrypt(c_response::$c_api_login);
        exit();
    }
}