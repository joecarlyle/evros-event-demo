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

$ip = $next3;
$access_key = '1df187a6a5f7156f959023e1516407e1';

// Initialize CURL:
$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$api_result = json_decode($json, true);

$country= $api_result['country_name'];
$city= $api_result['location']['capital'];

echo "<h1>The URL being accessed is:  " . $hostname . "</h1>";
echo "<br>";
echo "<h1>The IP is:  " . $next3 . "</h1>";
echo "<br>";
echo "<h1>The app is running in: " . $country . "</h1>";


?>
</body>
</html>