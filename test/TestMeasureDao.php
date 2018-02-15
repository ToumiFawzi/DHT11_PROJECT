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
        
        
       public function testfindMeasureById()
        {
            $measure = $this->measureDao->findMeasureById(4);
            $this->assertEquals("2018-01-14 01:22:37", $measure->datetime); //fonctionne
            $this->assertEquals(50, $measure->temperature);
            $this->assertEquals(30, $measure->humidite);
        }
        
        public function testfindAllMeasure()
        {
            $measures = $this->measureDao->findAllMeasure();
            $this->assertEquals(3, count($measures));
            
            $this->assertEquals("2018-01-14 01:22:37", $measures[0]->datetime);
            $this->assertEquals(50, $measures[0]->temperature);
            $this->assertEquals(30, $measures[0]->humidite);
            
            $this->assertEquals("2018-02-15 03:00:00", $measures[1]->datetime); //fonctionne
            $this->assertEquals(58, $measures[1]->temperature);
            $this->assertEquals(62, $measures[1]->humidite);
            
            $this->assertEquals("2018-02-14 11:00:00", $measures[2]->datetime);
            $this->assertEquals(21, $measures[2]->temperature);
            $this->assertEquals(50, $measures[2]->humidite);
        }
        
       public function testdeleteMeasure()
        {
            $measure = new Measure("2017-12-21 10:10:11", 42, 53);
            $id = $this->measureDao->createMeasure($measure);
            
            $newMeasure = $this->measureDao->findMeasureById($id);    //fonctionne
            
            $this->assertNotNull($newMeasure);
            $this->measureDao->deleteMeasure($id);
            
           $deletedMeasure = $this->measureDao->findMeasureById($id);
            $this->assertNull($deletedMeasure);
        }
        
      public function testcreateMeasure()
        {
            $measure = new Measure("2017-12-21 10:10:11",30,20);
            
            $id =$this->measureDao->createMeasure($measure);
            
            $newMeasure = $this ->measureDao->findMeasureById($id);
             
            $this->assertEquals("2017-12-21 10:10:11", $newMeasure->datetime); //fonctionne
            
            $this->assertEquals(30, $newMeasure->temperature);
            
            $this->assertEquals(20, $newMeasure->humidite);
            
            $this->measureDao->deleteMeasure($id);
            
        }  
       public function testupdateMeasure()
        {
            $measure = new Measure('1879-03-14 00:00:00', 23, 23);
            $id = $this->measureDao->createMeasure($measure);
            
            $newMeasure = $this->measureDao->findMeasureById($id);
            $newMeasure->datetime = '1879-03-14 10:00:00';
            $newMeasure->temperature = 28;
            $newMeasure->humidite = 28;
            
            $this->measureDao->updateMeasure($newMeasure, $id);       //fonctionne
            $updatedMeasure = $this->measureDao->findMeasureById($id);
            
            $this->assertEquals('1879-03-14 10:00:00', $updatedMeasure->datetime);
            $this->assertEquals(28, $updatedMeasure->temperature);
            $this->assertEquals(28, $updatedMeasure->humidite);
            
            $this->measureDao->deleteMeasure($id);
        }
        
}