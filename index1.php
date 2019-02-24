<!DOCTYPE html>
<html>

<title>Virustotal Automated Submitting Tool</title>
<head>
<body>

     <img src="https://static1.squarespace.com/static/55522a9de4b01b9c9d2f4cf0/t/5bd36df315fcc0f2ae88072b/1540582914630/Logo-1-e1497542166731.png" alt="Shearwater Logo" style="width:400px;height:200px;"> 
  Powered by: <img src="https://www.virustotal.com/ui-public/images/logo.svg" alt="Shearwater Logo" style="width:100px;height:18px;"> 
  
  
 <BR>
<font color = 'blue'>Single URL Search</font>
<form id="home" action="index1.php" method="POST">


 

<input type= "text" name = "domains">
		<!-- <textarea type= "text" name = "domains" rows="5" cols="40"></textarea> -->
		
<!-- <input type="submit" value="hit it!" /> -->

       <button type="submit">Submit Single Search</button>
</form>

<br> <br><br> <br>
<font color = 'blue'>Upload txt files only</font>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
    
 
</form>


<br> <br><br> <br>
<font color = 'blue'>Use this for 4 URLs Only</font>
<form id="multi" action="multiple.php" method="POST">


		<textarea type= "text" name = "domains" rows="5" cols="40"></textarea>


        <button type="submit">Submit Multiple</button>
</form>
</body>
</head>




<?php
//ilagay ang upload codes
//$old_submit = $_GET['domains']; 
//$current_url = 'index1.php';
echo "<table border= '1'>";
echo "<Td><b>Site Requested to be Scanned:</b><br></td>";
echo "<Td><b>Permalink for scan:</b><br></td>";
echo "<Td><b>Number of Detections:</b><br></td>";
echo "<Td><b>Websites assesment:</b><br></td>";
echo "<Td><b>Number of AV that has tagged unrated:</b><br></td>";
echo "<Td><b>Message from Virustotal:</b><br></td>";
echo "<Td><b>Asterisk Output:</b><br></td>";
echo "<tr>";


include('fuckyou.php');
include('global.php');
//eto ang processing codes. for 2 kinds of process 1 for single entry 1 for multiples
//get API KEY from environment, or set your API key here

$domain = $_POST['domains'];
$domainqueued = "";
//$copieddomains = "";

/* $api_key = '8b312efcb2f35f05bf521352367d5cf25589519d2ada00e6fc3e2df335ccca0d';
$av = ['CLEAN MX', 'DNS8','OpenPhish','VX Vault','ZDB Zeus','ZCloudsec','PhishLabs','Zerofox','K7AntiVirus','FraudSense','Virusdie External Site Scan','Quttera','AegisLab WebGuard','MalwareDomainList','ZeusTracker','zvelo','Google Safebrowsing','Kaspersky','BitDefender','Opera','Certly','G-Data','C-SIRT','CyberCrime','SecureBrain','Malware Domain Blocklist','MalwarePatrol','Trustwave','Web Security Guard','CyRadar','desenmascara.me','ADMINUSLabs','Malwarebytes hpHosts','Dr.Web','AlienVault','Emsisoft','Rising','Malc0de Database','malwares.com URL checker','Phishtank','Malwared','Avira','NotMining','StopBadware','Antiy-AVL','Forcepoint ThreatSeeker','SCUMWARE.org','Comodo Site Inspector','Malekal','ESET','Sophos','Yandex Safebrowsing','Spam404','Nucleon','Sucuri SiteCheck','Blueliv','Netcraft','AutoShun','ThreatHive','FraudScore','Tencent','URLQuery','Fortinet','ZeroCERT','Baidu-International','securolytics'];
 */




echo "<br>";echo "<br>";echo "<br>";
$post = array('apikey' => $api_key,'resource'=> $domain,'scan'=> '1');
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

$waitingmessshould = "Scan finished, scan information embedded in this object";

$waitingmess = $js['verbose_msg'];


echo $waitingmess."****";

if ($waitingmess != $waitingmessshould){
    echo "<td>";
    echo "$domain";
    echo "</td>";
    
    echo "<td>";
    echo "no result yet waiting to be scanned by Virustotal";
    echo "</td>";
    
    $pasascanid = $js['scan_id'];
    
    $domainqueued = "$domainqueued\n$pasascanid";
    
    
}

else {
    
    fuckyou($domain,$ch,$status_code,$result,$av);
}


?>

<form method="POST" action="multiple.php">
		<button>Resubmit Pendings URLs</button>
		<input type="hidden" name="domains" value= "<?php echo "$domainqueued";?>">
    
</form>


</html>
