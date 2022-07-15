<?php

class CollectorModal{
    public int $idScooter;
    public float $latitude;
    public float $longitude;
    public float $distance;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude, int $idScooter)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->idScooter = $idScooter;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }




}