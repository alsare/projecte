<?php

namespace My;

class User{

    const COOKIE_NAME = "session_token";

    public function getId(){

        return $_SESSION["uid"];
    }

    public function getToken(){

        return $_COOKIE[self::COOKIE_NAME];
    }
    public function isAuthenticated(){
        if (self::getToken()){
            return true;

        }
        return false;
    }
}
