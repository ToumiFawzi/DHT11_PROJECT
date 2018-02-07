<?php

include 'classes/dao/DaoBdd.php';
include 'classes/dao/MeasureDao.php';
include 'classes/domain/Measure.php';
$config = include 'includ/config.inc.php';

$measureDao = new MeasureDao($config);
/*$data1 = new Measure("2018-02-14 11:00:00",21,50);
$measureDao->createMeasure($data1);*/


//$sup = $measureDao->deleteMeasure(1);

//var_dump($searchMeasure = $measureDao->findMeasureById(4));

$data = new Measure("2018-02-15 03:00:00",58,62);
$edit=$measureDao->updateMeasure($data,5);

?>

