<?php

class G{
    /*HTTP验证*/
    public static function http_auth () {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="Action Auth"');
            header('HTTP/1.0 401 Unauthorized');
            G::code_die(401, "ACTION_NEED_AUTH");
        } else {
            if ($_SERVER['PHP_AUTH_USER']!=PHP_AUTH_USER || $_SERVER['PHP_AUTH_PW']!=PHP_AUTH_PW) {
                header('WWW-Authenticate: Basic realm="Action Auth"');
                header('HTTP/1.0 401 Unauthorized');
                G::code_die(401, "ACTION_NEED_AUTH");
            }
        }
        return true;
    }

    public static function code_die($code, $result){
        $_get = $_REQUEST;
        $o = array("code"=>$code, "request"=>$_get, "result"=>$result);
        die(json_encode($o));
    }

}