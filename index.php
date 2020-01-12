<!DOCTYPE html>
<html>
<body>



<img src="evroslogo.png" alt="Evros logo" height="500"/> 

<?php

//echo "<br>";
//echo $_SERVER['SERVER_NAME'];
//echo "<br>";
$hostname = $_SERVER['SERVER_NAME'];
$result = dns_get_record($hostname,DNS_CNAME);
$next = $result[0]['target'];
//echo $next;
//echo "<br>";
$result2 = dns_get_record($next,DNS_CNAME);
$next2 = $result2[0]['target'];
//echo $next2;
//echo "<br>";
$result3 = dns_get_record($next2,DNS_A);
$next3 = $result3[0]['ip'];
//echo $next3;

echo "<h1>This webapp is called:  " . $hostname . "</h1>";
echo "<br>";
echo "<h1>The IP is:  " . $next3 . "</h1>";
?>
</body>
</html>