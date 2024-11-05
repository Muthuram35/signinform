<?php 

echo 'Fibonacci Series 1  : ';

$no1  = 0;

$no2 = 1;

echo $no1." ".$no2;

for($i = 0 ; $i < 10 ; $i++)
{
    $no3  = $no2 + $no1; 
    echo " ".$no3 ;
    $no1 = $no2;
    $no2 = $no3;
}

echo "<br> Fibonacci Series 2   : ";

$num = 100;

$no11 = 0;

$no22 = 1;

echo $no11." ".$no22;

$no33  = 0;

while($num!=0){



$no33 = $no22 + $no11;
$no11 = $no22;
$no22 = $no33;
if($no33< 100){
    echo " ".$no33;
    continue;
    }

else{
break;
}
}

?>

