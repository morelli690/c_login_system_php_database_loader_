<?php
class c_security{
    static function encrypt($str){
		return base64_encode(c_security::caesar(base64_encode($str), 8));
    }
    static function anti_sql_string($string) { //thanks to krawk
        $string = str_replace(array("'", 'Â´', '"', 'SELECT FROM', 'SELECT * FROM', 'ONION', 'union', 'UNION', 'UDPATE users SET', 'WHERE username', 'DROP TABLE', '0x50', 'mid((select', 'union(((((((', 'concat(0x', 'concat(', 'OR boolean', 'or HAVING', "OR '1", '0x3c62723e3c62723e3c62723e', '0x3c696d67207372633d22', '+#1q%0AuNiOn all#qa%0A#%0AsEleCt', 'unhex(hex(Concat(', 'Table_schema,0x3e,', '0x00', '0x08', '0x09', '0x0a', '0x0d', '0x1a', '0x22', '0x25', '0x27', '0x5c', '0x5f',), "", $string);
        $string = str_replace(array('<img', 'img>', '<image', 'document.cookie', 'onerror()', 'script>', '<script', 'alert(', 'window.', 'String.fromCharCode(', 'javascript:', 'onmouseover="', '<BODY onload', '<style', 'svg onload'), "", $string);
        $string = str_replace(array("script", " ", "java", "applet", "iframe", "meta", "object", "html", "<", ">", ";", "'", "%", "&"), "", $string);
        $string = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $string);
        $string = htmlspecialchars($string);
        $string = stripslashes($string);
        $string = htmlentities($string);
        $string = strip_tags($string);
        return $string;
    }
    static function random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    static function caesar($str, $n) {
        $ret = "";
        for($i = 0, $l = strlen($str); $i < $l; ++$i) {
            $c = ord($str[$i]);
            if (97 <= $c && $c < 123) {
                $ret.= chr(($c + $n + 7) % 26 + 97);
            } else if(65 <= $c && $c < 91) {
                $ret.= chr(($c + $n + 13) % 26 + 65);
            } else {
                $ret.= $str[$i];
            }
        }
        return $ret;
    }
}