<?php 

$no1 = 70;

$no2 = 30;

$no3 = 0;

$no3 = $no2;

$no2  = $no1 ;

$no1 = $no3;

echo $no1. " " . $no2 . "<br>";

$no11 = 10 ;

$no22 = 300 ;

$no22 = $no22 + $no11;

$no11 = $no22 - $no11;

$no22 = $no22 - $no11;

echo "<br>". $no11 . " " . $no22 ."<br>";

?>