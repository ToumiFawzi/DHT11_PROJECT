<?php

use PHPUnit\Framework\TestCase;
use domain\Measure;

include 'autoload.inc.php';

class TestMeasure extends TestCase
{
    public function __construct() {
        
        parent::__construct();
    }
    
  public function testMeasure()
  {
    $measure = new Measure("2017-12-21 10:10:11",32,50);

      $this->assertEquals("2017-12-21 10:10:11", $measure->datetime);

      $this->assertEquals(32, $measure->temperature);

      $this->assertEquals(50, $measure->humidite);

  }
 }

