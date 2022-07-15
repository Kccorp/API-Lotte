<?php

class DatabaseSettings
{
//    static $driver = "mysql";
//    static $name = "m6qku2mxgghdq37a";
//    static $host = "ilzyz0heng1bygi8.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
//    static $user = "zi079ph5hsli9dsz";
//    static $password = "uesgcm2e869kdo87";

    static $driver = "mysql";
    static $name = "m6qku2mxgghdq37a";
    static $host = "87.90.32.205";
    static $user = "admin";
    static $password = "Test1234";

    static $pdoSettings = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public static function getConnection()
    {
        $driver = DatabaseSettings::$driver;
        $databaseName = DatabaseSettings::$name;
        $host = DatabaseSettings::$host;
        $user = DatabaseSettings::$user;
        $password = DatabaseSettings::$password;

        return new PDO("$driver:dbname=$databaseName;host=$host", $user, $password, DatabaseSettings::$pdoSettings);
    }
}
