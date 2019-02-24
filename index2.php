<?php

//get API KEY from environment, or set your API key here

$api_key = '8b312efcb2f35f05bf521352367d5cf25589519d2ada00e6fc3e2df335ccca0d';

$domain = 'drive.google.com';


$data = array('apikey' => $api_key,'domain'=> $domain);
$ch = curl_init();
$url = 'https://www.virustotal.com/vtapi/v2/domain/report?';
$url .= http_build_query($data); // append query params
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, 1); // remove this if your not debugging
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);

$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print("status = $status_code\n");
if ($status_code == 200) { // OK
    $js = json_decode($result, true);
    
    $arrayOfArrays = json_decode($result,true);
    print_r($arrayOfArrays);
    
    
    echo $js['BitDefender category'];
    echo $js['positives'];
    
    
    
} else {  // Error occured
    print($result);
}
curl_close ($ch);
?>