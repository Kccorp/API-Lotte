<?php

require __DIR__ . "/../database/settings.php";

class RideModel
{

    public static function updateOneById($id)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("UPDATE lotte_ride SET status = 'done' WHERE idUser = :id");
        $query->execute(["id" => $id]);
    }

    public static function getActiveRide($idUser)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("SELECT idScooter FROM lotte_ride WHERE idUser = :idUser AND status = 'pending'");
        $query->execute(["idUser" => $idUser]);
        return $query->fetch();
    }

    public static function setHsScooter($idScooter){
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("UPDATE lotte_scooter SET status = 'hs' WHERE idScooter = :idScooter");
        $query->execute(["idScooter" => $idScooter]);
    }

}
