<?php

include_once ("c_settings.php");
include_once ("c_response.php");

function c_register($c_username, $c_email, $c_password) {
    global $c_con; // ghetto asf(i dont like funcs!)

    if (!empty($c_username) && !empty($c_password) && !empty($c_email)) {
        $c_user_check = $c_con->query("SELECT * FROM c_data WHERE c_username='" . AntiSQLString($c_username) . "'");
        if (!mysqli_num_rows($c_user_check) > 0) {
            $c_email_result = $c_con->query("SELECT * FROM c_data WHERE c_email = '" . AntiSQLString($c_email) . "'");
            if (!mysqli_num_rows($c_email_result) > 0) {
                $c_enc_pass = password_hash($c_password, PASSWORD_BCRYPT);
                $c_ip = file_get_contents("http://api.ipify.org"); // ghetto asf(i dont like funcs!)
                $query = "INSERT INTO c_data (c_username, c_email, c_password, c_ip) 
  			  VALUES ('".AntiSQLString($c_username)."', '".AntiSQLString($c_email)."', '".AntiSQLString($c_enc_pass)."', '".AntiSQLString($c_ip)."')";
                $c_con->query($query);


                c_response::$c_register = "success";
                return true;
            } else {
                c_response::$c_register = "email_already_taken";
                return false;
            }
        } else {
            c_response::$c_register = "username_already_taken";
            return false;
        }
    } else {
        c_response::$c_register = "empty_data";
        return false;
    }
}

