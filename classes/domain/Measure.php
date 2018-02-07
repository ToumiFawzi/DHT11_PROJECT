<?php
/**
 * Created by PhpStorm.
 * User: fawzi
 * Date: 07/02/18
 * Time: 11:38
 */

class Measure
{
    public $id;
    public $datetime;
    public $temperature;
    public $humidite;

    public function __construct($datetime, $temperature, $humidite)
    {

        $this->datetime = $datetime;

        $this->temperature = $temperature;

        $this->humidite = $humidite;

    }
}