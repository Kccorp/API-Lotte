<?php

include __DIR__ . "/../library/collector.php";
include __DIR__ . "/../models/collector.php";
include __DIR__ . "/../modals/collector.php";

class CollectorController
{
    public static function get( int $site ): void
    {

        if ($site == 1){
            $latIni = 45.771516;
            $longIni = 4.880276;
        } elseif ($site == 2){
            $latIni = 45.741727;
            $longIni = 4.840965;
        } elseif ($site == 3){
            $latIni = 45.781229;
            $longIni = 4.820577;
        } else {
            Response::json(400, [], ["success" => 0, "error" => "Bad request"]);
        }



        $scooters = CollectorModel::getHsScooter();

        $distancesInit = [];
        $distancesFinal = [];



        foreach ($scooters as $pos => $value) {
            $lat = $value["latitude"];
            $lon = $value["longitude"];
            $idScooter = $value["idScooter"];
            $scooter = new CollectorModal($lat, $lon, $idScooter);
            $distancesInit[] = $scooter;
        }

        foreach ($distancesInit as $pos => $value){
            $distance = CollectorLibrary::calculateDistance($latIni, $longIni, $value->getLatitude(), $value->getLongitude());
            if ($distance == -1){
                unset($distancesInit[$pos]);
                $distancesInit = array_values($distancesInit);
            }
        }



        $posLat = $latIni;
        $posLong = $longIni;

        while (!empty($distancesInit)){

            CollectorLibrary::calculeAllDistances($posLat, $posLong, $distancesInit);

            $minIndex = CollectorLibrary::foundMin($distancesInit);

//            if ($distancesInit[$minIndex]->getDistance() != -1){
                $distancesFinal[] = $distancesInit[$minIndex];
                $posLat = $distancesInit[$minIndex]->getLatitude();
                $posLong = $distancesInit[$minIndex]->getLongitude();
//            }

            unset($distancesInit[$minIndex]);
            $distancesInit = array_values($distancesInit);

        }

        $distancesFinal = array_reverse($distancesFinal);


        Response::json(200, [], ["path" => $distancesFinal]);

    }

}

