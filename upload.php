
<html>
<title>Virustotal Automated Submitting Tool</title>
<head>
<body>

     <img src="https://static1.squarespace.com/static/55522a9de4b01b9c9d2f4cf0/t/5bd36df315fcc0f2ae88072b/1540582914630/Logo-1-e1497542166731.png" alt="Shearwater Logo" style="width:400px;height:200px;"> 
  Powered by: <img src="https://www.virustotal.com/ui-public/images/logo.svg" alt="Shearwater Logo" style="width:100px;height:18px;"> 
  
  
 <BR>
<form action="index.php" >
    
 
    <button>Back</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</form>

</head>


<?php

include('fuckyou.php');
include('global.php');


echo "<table border= '1'>";
echo "<Td><b>Site Requested to be Scanned:</b><br></td>";
echo "<Td><b>Permalink for scan:</b><br></td>";
echo "<Td><b>Number of Detections:</b><br></td>";
echo "<Td><b>Websites assesment:</b><br></td>";
echo "<Td><b>Number of AV that has tagged unrated:</b><br></td>";
echo "<Td><b>Message from Virustotal:</b><br></td>";
echo "<Td><b>Asterisk Output:</b><br></td>";
echo "<tr>";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$cunt = 0;



$domainqueued = "";
$copieddomain = "";

/* $copyqueuedadded = "";
$copyqueued ="";
 */

if(isset($_POST["submit"])) {
  //add commands for submit
  
    
    
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "txt" && $imageFileType != "xlsm" && $imageFileType != "xslx") {
    echo "Please upload the following file types only (.txt, .xslx., .xslm)";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error


if ($uploadOk == 0) {
    echo "<font color = 'red' size = 25> Wag mo sirain!!! </font>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //code when uploaded
        echo "<br>";      
        //reading text OLD
        $fp = fopen($target_file, 'r');
        while ( ($line = fgets($fp)) !== false) {
           
            $line = trim($line);
            if(isset($line) === true && $line === '') {
                 
            }
            else {
                
                // It's not empty
                
            
                $domainarr[] = $line;
                //echo "$line";
                //echo "<br>";
                
            }
        
        }
         
        fclose($fp);
        
        foreach ($domainarr as $domain) {
            
            if (is_null($domain)){
                echo "<tr><td>No URL detected</td>";
            }
            else{
               $cunt = $cunt +1;
                //echo $cunt;
   //addito             
                if ($cunt % 4 == 0) {
                    sleep (45);
                    //echo "sleeping ako ng 60 secs";
                    goto palabas;
                }
                
                else {
                    palabas:
                //dito ako nag kaka error
                    $post = array('apikey' => $api_key,'resource'=> $domain,'scan'=> '1');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/url/report');
                curl_setopt($ch, CURLOPT_POST, True);
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
                curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                $result=curl_exec ($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
               
                $js2 = json_decode($result, true);
                ini_set('max_execution_time', 300);
                
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                sleep(2);
                //dito ako nag kaka error
                curl_close ($ch);
                
                //echo $js2['verbose_msg'];
                if ($js2['verbose_msg'] == 'Scan finished, scan information embedded in this object')
                {
                
                $copyqueuedadded = fuckyou($domain,$ch,$status_code,$result,$av);
              /*   $copyqueued = "$copyqueued \n\r $copyqueuedadded";
                 */
              
                $copyqueued[] = $copyqueuedadded;
                
                }
                elseif ($js2['verbose_msg'] = "Scan request successfully queued, come back later for the report"){
                    
                    echo "<td>";
                    echo $domain;
                    echo "</td>";
                    
                    
                    echo "<td>";
                    echo "no result yet waiting to be scanned by Virustotal";
                    echo "<BR><BR>";
                    
                    echo $js2['permalink'];
                    
                    //$domain = 'domains';
                    
                    echo "</form>";
                    
                    $pasascanid = $js2['scan_id'];
                    
                    $domainqueued = "$domainqueued\n$pasascanid";
                    

                    echo "</td>";
                    echo "<tr>";
                }
                
                
                elseif ($js2['verbose_msg'] = "Resource does not exist in the dataset"){
                    
                    echo "<td>";
                    echo "Resource does not exist in the dataset";
                   /*  
                    echo "<form action='index1.php' method='post'>";
                    //$domain = 'domains';
                    echo  "<input type='text' name='domains'/>";
                    echo "<input type='submit' name='SubmitButton'/>";
                    echo "</form>";
                     */
                    
                    echo "</td>";
                    echo "<tr>";
                }
            
         
        
                }}
            
           
                
        }
        
        
        
        
        unlink($target_file); 
        /*        $wholeTextFile = explode("\n", file_get_contents($target_file));
        $totalLinesinFile = sizeOf($wholeTextFile);
        for ($i = 0; $i < $totalLinesinFile ; $i++) {
            echo "Line number is ".$i."<br>";
            echo wholeTextFile[$i]."<hr>";
        */
        
        
        
       
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo 'Here is some more debugging info:';
        print_r($_FILES);
        
        print "</pre>";
    }
} //upload ok

}


//echo $domainqueued;

?>

<form method="POST" action="multiple.php">
		<button>Resubmit Pendings URLs</button>
		<input type="hidden" name="domains" value= "<?php echo "$domainqueued";?>">
    
</form>



<div id="copy-text" style="float: right;" > <font color= white> <?php 
                                        foreach ($copyqueued as $copyshow) {
                                            echo "$copyshow";
                                            echo "<br>";
                                        }
                                        ?></font> </div>
                                        
                                        
                                        
<button onclick="copyToClipboard('#copy-text')" type="button" >Copy Outputs</button>



<script>
function copyToClipboard(element) {
	  var text = $(element).clone().find('br').prepend('\r\n').end().text()
	  element = $('<textarea>').appendTo('body').val(text).select()
	  document.execCommand('copy')
	  element.remove()
	}
</script>



</body>
</html>