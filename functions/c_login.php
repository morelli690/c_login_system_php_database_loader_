<?php

include("c_settings.php");
$c_login_success = false;

function c_login($c_username, $c_password) {
    global $c_con; // ghetto asf(i dont like funcs!)
    global $c_login_success; // ghetto asf(i dont like funcs!)
    if (!empty($c_username)) {
        $c_user_result = "SELECT * FROM c_data WHERE c_username='" . mysqli_real_escape_string($c_con, $c_username) . "'";
        $c_user_check = $c_con->query($c_user_result);
        if (mysqli_num_rows($c_user_check) != 0) {
            if (!empty($c_password)) {
                while ($c_row = $c_user_check->fetch_assoc()) {
                    if(password_verify($c_password, $c_row["c_password"])){
                        $c_ip = file_get_contents("http://api.ipify.org"); // ghetto asf(i dont like funcs!)
                        $c_con->query($c_con, "INSERT into c_data (c_ip) VALUE ('$c_ip')");
                        $c_login_success = true;
                    }
                    else{
                        "wrong password";
                        $c_login_success = false;
                        exit();
                    }
                }
            }
            else{
                echo "empty password";
                $c_login_success = false;
                exit();
            }
        }
        else{
            echo "invalid username";
            $c_login_success = false;
            exit();
        }
    }
    else{
        echo "empty username";
        $c_login_success = false;
        exit();
    }
}
