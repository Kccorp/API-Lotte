<?php


class ConnectController
{
    public static function get( ): void
    {

        $pwd = $_GET["pwd"];
        $pwdHash = $_GET["pwd_hash"];

        if (password_verify($pwd, $pwdHash)) {
            echo 'Password is correct';
        } else {
            echo 'Password is incorrect';
        }

    }

}

