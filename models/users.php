<?php

require __DIR__ . "/../database/settings.php";

class UserModel
{
    public static function getOneByEmail($email)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("SELECT idUser, isCollector, name, password FROM lotte_user WHERE email = :email");

        $query->execute(
            [
            "email" => $email
            ]
        );

        $user = $query->fetch();

        return $user;
    }
}
