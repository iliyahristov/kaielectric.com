<?php

ini_set('max_execution_time', 5000);
set_time_limit(0); // safe_mode is off

if(isset($_SERVER['HTTP_HOST'])){
	$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
	$domain = $protocol . '://' . $_SERVER['HTTP_HOST'].'/';
} else{
	$domain = $argv[1];
}

$url = $domain.'index.php?route=extension/shipping/tk_sameday/shipping';


$ch  = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
$data = curl_exec($ch);
print_r($data);
curl_close($ch);
