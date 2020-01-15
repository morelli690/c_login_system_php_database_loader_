<?php

include_once ("c_settings.php");
include_once ("c_response.php");

function c_login($c_username, $c_password) {
    global $c_con; // ghetto asf(i dont like funcs!)

    if (!empty($c_username)) {
        $c_user_result = "SELECT * FROM c_data WHERE c_username='" . AntiSQLString($c_username) . "'";
        $c_user_check = $c_con->query($c_user_result);
        if (mysqli_num_rows($c_user_check) != 0) {
            if (!empty($c_password)) {
                while ($c_row = $c_user_check->fetch_assoc()) {
                    if(password_verify($c_password, $c_row["c_password"])){
                        $c_ip = file_get_contents("http://api.ipify.org"); // ghetto asf(i dont like funcs!)
                        $c_con->query("INSERT into c_data (c_ip) VALUE ('".AntiSQLString($c_ip)."')");

                        c_response::$c_login = "success";
                        return true;
                    }
                    else{
                        c_response::$c_login = "wrong_password";
                        return false;
                    }
                }
            }
            else{
                c_response::$c_login = "empty_password";
                return false;
            }
        }
        else{
            c_response::$c_login = "invalid_username";
            return false;
        }
    }
    else{
        c_response::$c_login = "empty_username";
        return false;
    }
}
