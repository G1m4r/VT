<?php



include('global.php');


function vtpost($api_key,$domain){


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/url/report');
curl_setopt($ch, CURLOPT_POST, True);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);

$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
$js = json_decode($result, true);


//return $status_code;
return $js;

}
?>