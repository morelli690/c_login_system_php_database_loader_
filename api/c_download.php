<?php
include ("../functions/c_main.php");

//this was mostly made for cheetos
//i was going to do an function, but its not needed and stuff, this should work fine

if(isset($_GET["t"])){
    global $c_con; //who dont love globals :)

    $res = $c_con->query("SELECT * FROM c_tokens WHERE c_token='".c_security::anti_sql_string($_GET["t"])."'");
    if($res->num_rows != 0){
        while($c_row = $res->fetch_assoc()){
            if($c_row["c_expires"] > time()){
                c_response::$c_api_download = "success";
                /*
                here you do whatever you want to do when your session is not expired,
                if you own and cheat and stuff you should just download it here
                later i will make an c# class integrating stuff for newbs
                */
                echo c_security::encrypt(c_response::$c_api_download); exit();
            }
            else{
                c_response::$c_api_download = "token_expired";
                echo c_security::encrypt(c_response::$c_api_download); exit();
            }
        }
    }
    else{
        c_response::$c_api_download = "unexistent_token";
        echo c_security::encrypt(c_response::$c_api_download); exit();
    }
}