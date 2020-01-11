<?php

include ("c_settings.php");
$c_register_success = false;
function c_register($c_username, $c_email, $c_password)
{
    global $c_con; // ghetto asf(i dont like funcs!)
    global $c_register_success; // ghetto asf(i dont like funcs!)

    if (!empty($c_username) && !empty($c_password) && !empty($c_email)) {
        $c_user_result = "SELECT * FROM `c_data` WHERE c_username='" . mysqli_real_escape_string($c_con, $c_username) . "'";
        $c_user_check = $c_con->query($c_user_result);
        if (!mysqli_num_rows($c_user_check) > 0) {
            $c_email_check = "SELECT * FROM c_data WHERE c_email = '$c_email'";
            $c_email_result = mysqli_query($c_con, $c_email_check);
            if (!mysqli_num_rows($c_email_result) > 0) {
                $c_enc_pass = password_hash($c_password, PASSWORD_BCRYPT);
                $c_ip = file_get_contents("http://api.ipify.org"); // ghetto asf(i dont like funcs!)
                $query = "INSERT INTO c_data (c_username, c_email, c_password, c_ip) 
  			  VALUES('$c_username', '$c_email', '$c_enc_pass', '$c_ip')";
                $c_con->query($query);
                $c_register_success = true;
            } else {
                echo "email already taken";
                $c_register_success = false;
                exit();
            }
        } else {
            echo "username already taken";
            $c_register_success = false;
            exit();
        }
    } else {
        echo "empty data";
        $c_register_success = false;
        exit();
    }
}

