<?php

class CollectorLibrary{

    public static function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $kilometers = $miles * 1.609344;
        if ($kilometers >= 5) {
            return -1;
        }
        return $kilometers;
    }

    public static function calculeAllDistances($latIni, $longIni, $distancesInit){
        foreach ($distancesInit as $pos => $value) {
            $distance = CollectorLibrary::calculateDistance($latIni, $longIni, $value->getLatitude(), $value->getLongitude());
            $value->setDistance($distance);
        }
    }

    public static function foundMin( $distances ){

        $min = $distances[0];
        $index = 0;

        foreach ($distances as $pos => $value) {
            if ($value->getDistance() < $min->getDistance()){
                $min = $value;
                $index = $pos;
            }
        }
        return $index;
    }

}
