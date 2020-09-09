<?php

namespace orgettle\GeoTracking;

use orgebattle\Distance\Distance;
use orgebattle\Trilateration\Intersection;
use orgebattle\Trilateration\Sphere;

Class GTracking
{
    private Intersection $intersection;

    public function __construct(Intersection $intersection)
    {
        $this->intersection = $intersection;
    }

    public function getPoints(Sphere $sphere1, Sphere $sphere2, Sphere $sphere3)
    {
        $intersection = new Intersection($sphere1, $sphere2, $sphere3);
        return $intersection->position();
    }

    public function getSphere(float $latitude, float $longitude, int $txPower, int $rssi, int $factor)
    {
        $radius = $redius ?? new Distance($txPower, $rssi, $factor);

        return new Sphere($latitude, $longitude, $radius);
    }
}
