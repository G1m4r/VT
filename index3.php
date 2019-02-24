<!DOCTYPE html>
<html>
<head>
<body>
<form id="home" action="index1.php" method="POST">
		<input type= "text" name = "domains">
		
		
        <button type="submit">Submit</button>
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
    
 
</form>

		
    </body>
</head>

<?php
//ilagay ang upload codes
$old_submit = $_GET['domains']; 
$current_url = 'index1.php';



//eto ang processing codes. for 2 kinds of process 1 for single entry 1 for multiples
//get API KEY from environment, or set your API key here
$api_key = '8b312efcb2f35f05bf521352367d5cf25589519d2ada00e6fc3e2df335ccca0d';
$domain = $_POST['domains'];



echo "<br>";echo "<br>";echo "<br>";


$post = array('apikey' => $api_key,'resource'=> $domain);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/url/report');
curl_setopt($ch, CURLOPT_POST, True);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
 
$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$av = ['CLEAN MX', 'DNS8','OpenPhish','VX Vault','ZDB Zeus','ZCloudsec','PhishLabs','Zerofox','K7AntiVirus','FraudSense','Virusdie External Site Scan','Quttera','AegisLab WebGuard','MalwareDomainList','ZeusTracker','zvelo','Google Safebrowsing','Kaspersky','BitDefender','Opera','Certly','G-Data','C-SIRT','CyberCrime','SecureBrain','Malware Domain Blocklist','MalwarePatrol','Trustwave','Web Security Guard','CyRadar','desenmascara.me','ADMINUSLabs','Malwarebytes hpHosts','Dr.Web','AlienVault','Emsisoft','Rising','Malc0de Database','malwares.com URL checker','Phishtank','Malwared','Avira','NotMining','StopBadware','Antiy-AVL','Forcepoint ThreatSeeker','SCUMWARE.org','Comodo Site Inspector','Malekal','ESET','Sophos','Yandex Safebrowsing','Spam404','Nucleon','Sucuri SiteCheck','Blueliv','Netcraft','AutoShun','ThreatHive','FraudScore','Tencent','URLQuery','Fortinet','ZeroCERT','Baidu-International','securolytics'];

$av1 = $js['scans'];
array_reverse($av1);



if ($status_code == 200) { // OK
    //print("status = $status_code\n");
    echo "<b>Site Requested to be Scanned:</b><br>";
    
    
      $js = json_decode($result, true);
      $shits = $js['positives'];
    
  echo "<font color='blue'>$domain</font>";
  echo "<br>";echo "<br>";echo "<br>";
  
  $wait = $js['verbose_msg'];
  $waitingmess = "Resource does not exist in the dataset";
  
  //waitingness
  if ($wait == $waitingmess){
  
  echo $js['verbose_msg'];}
  
  if ($wait == $waitingmess){
      header("Location: $current_url");;
      
  }else{
  
  $redi = $js['permalink'];
  echo "<br> <a href=$redi>Virus Total Result</a>";

  
  
  
  echo "<br>";echo "<br>";echo "<br>";
        
            if ($shits > 1 ){
            echo "Positives: ";echo "<font color = 'red'> $shits </font>";echo "/";echo $js['total'];
             }
            else{
                echo "Positives: ";echo $js['positives'];echo "/";echo $js['total'];
            }

        
  echo "<br>";echo "<br>";echo "<br>";
  echo $js['verbose_msg'];
  
  echo "<br>";echo "<br>";echo "<br>";
  
  $unratedshitcount = 0;
  foreach ($av as $v) { 
  $bool = $js['scans'][$v]['detected'];
  $aysus = $js['scans'][$v]['result'];
  $ayaw = "suspicious site";
  $unratedshit = "unrated site";


  if ($aysus === $unratedshit){
      $unratedshitcount = $unratedshitcount + 1;
  }
  else {}
  
  
  if ($bool == 1){
      echo "Detecting AV is:"; echo "<font color = 'green'> $v</font>"; 
      echo ' has detected shits on this site';echo "<br>";
  }else {}
  
  
  if ($aysus === $ayaw){
      echo "This has been tagged as a Suspicious site by:"; echo "<font color = 'green'> $v</font>";echo "<br>";
  }
  else {}
   
  
  
}

echo "Number of websites that has tagged this website as unrated:<b><u> $unratedshitcount </u></b>"; 
}
curl_close ($ch);

}
?>

</html>