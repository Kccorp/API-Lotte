<?php
require __DIR__ . "/../database/settings.php";

class CollectorModel {

    public static function getHsScooter()
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("Select latitude, longitude, idScooter from lotte_scooter where status = 'hs'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}