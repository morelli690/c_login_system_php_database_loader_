<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "auth";

$c_con = mysqli_connect($host, $user, $pass, $db);
mysqli_query($c_con, "SET NAMES UTF8") or die(mysqli_error($c_con));
date_default_timezone_set('UTC');
error_reporting(E_ALL);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function AntiSQLString($string) { //thanks to krawk
    $string = str_replace(array("'", 'Â´','"',   'SELECT FROM', 'SELECT * FROM',  'ONION',  'union',   'UNION', 'UDPATE users SET','WHERE username',  'DROP TABLE',    '0x50',  'mid((select','union(((((((', 'concat(0x',  'concat(','OR boolean', 'or HAVING',"OR '1", '0x3c62723e3c62723e3c62723e','0x3c696d67207372633d22','+#1q%0AuNiOn all#qa%0A#%0AsEleCt',  'unhex(hex(Concat(', 'Table_schema,0x3e,', '0x00',  '0x08',  '0x09', '0x0a',   '0x0d',  '0x1a', '0x22','0x25','0x27',  '0x5c', '0x5f', ), "", $string);
    $string = str_replace(array('<img', 'img>',  '<image', 'document.cookie', 'onerror()', 'script>','<script', 'alert(','window.','String.fromCharCode(',   'javascript:',  'onmouseover="', '<BODY onload','<style','svg onload'), "", $string);
    $string = str_replace(array("script"," ","java","applet","iframe","meta","object","html", "<", ">", ";", "'","%","&"),"",$string);
    $string = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $string);
    $string = htmlspecialchars($string);
    $string = stripslashes($string);
    $string = htmlentities($string);
    $string = strip_tags($string);
    return $string;
}

/*any sugestions you may contact me on discord : FinGu#1337 or make an issue! */