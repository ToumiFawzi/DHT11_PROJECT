<?php
include 'includ/autoload.inc.php';

$config = include 'includ/config.inc.php';

$tt = new MeasureDao($config);
$data1 = new Measure("2018-02-14 11:00:00",21,50);
$tt->createMeasure($data1);


?>