<?php
use dao\MeasureDao;
use PHPUnit\Framework\TestCase;
use domain\Measure;

include 'autoload.inc.php';

class TestMeasureDao extends TestCase
{
    public function __construct()
    {
     parent::__construct();
    }
    
    private $measureDao;
    
    protected function setUp() 
       {
        
        parent::setUp();
        
        $config = include '../includ/config.inc.php';
        
        $this->measureDao = new MeasureDao($config);
       }
        
    protected function tearDown() 
       {
            
         $this->measureDao->close();
            
         $this->measureDao = null;
            
         parent::tearDown();
        }
        public function testcreateMeasure()
        {
            $measure = new Measure(new DateTime("2017-12-21"), $temperature, $humidite);
            
          /*  $id = $this->MeasureDao->createMeasure($measure);
            
            $newMeasure = $this->MeasureDao->findMeasureById($id);*/
            
            $this->assertEquals(2017, $newMeasure->dateTime->format("Y"));
            
           // $this->assertEquals(10, $newMeasure->dateTime->format("H"));
            
            $this->assertEquals(30, $newMeasure->temperature);
            
            $this->assertEquals(20, $newMeasure->humidite);
            
           // $this->MeasureDao->deleteMeasure($id);
        }      
}