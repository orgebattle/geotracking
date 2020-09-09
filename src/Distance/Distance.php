<?php

namespace orgebattle\geotracking\Distance;

Class Distance
{
    /**
     * @var int
     */
    protected int $txPower;

    /**
     * @var int
     */
    protected int $rssi;

    /**
     * depends on environmental factors
     * 2 for free space, 2.7 to 3.5 for urban areas,
     * 3.0 to 5.0 in suburban areas, 1.6 to 1.8 for indoors
     * @var int
     */
    protected int $factor = 2;

    /**
     * Distance constructor.
     * @param $txPower
     * @param $rssi
     * @param $factor
     */
    public function __construct($txPower, $rssi, $factor)
    {
        $this->txPower = $txPower;
        $this->rssi = $rssi;
        $this->factor = $factor;
    }

    /**
     * @return int
     */
    public function getTxPower(): int
    {
        return $this->txPower;
    }

    /**
     * @return int
     */
    public function getRssi(): int
    {
        return $this->rssi;
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        if (!$this->txPower || !$this->rssi) {
            return -1;
        }

        return pow(10, ($this->txPower - $this->rssi) / (10 * $this->factor));
    }

}
