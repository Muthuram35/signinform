<?php
date_default_timezone_set('Asia/Kolkata');
echo time();
echo "<br>";
echo date( 'D d- M m-Y  h:i:s A', strtotime("now") );

echo "<br>".date('d');
echo "<br>".date('D');
echo "<br>".date('j');
echo "<br>".date('l');

?> 