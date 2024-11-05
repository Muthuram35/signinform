<?php 


$no = 12345;

$num = 0;

while( $no!=0 ){

    $rem = $no%10;
    $num += $rem;
    $no = $no/10;

}

echo $num;

$no = 371;

$num = 0;

while( $no!=0 ){

    $rem = $no%10;
    $num = $num +  $rem * $rem * $rem; 
    $no = $no/10;

}
echo "<br>".$num;

$no2 = 0 ;

for($i = 1 ; $i<=100;$i++){
    $no2 += $i;
}

echo "<br>".$no2;
?>