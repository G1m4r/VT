
<!DOCTYPE html>
<html>

<?php
$copieddomain = "";

function fuckyou($domain,$ch,$status_code,$result,$av){
    
    
if ($status_code == 200) { // OK
    //print("status = $status_code\n");
    //echo "<Td><b>Site Requested to be Scanned:</b><br></td>";
    
    
      $js = json_decode($result, true);
      $shits = $js['positives'];
    
  echo "<td><font color='blue'>$domain</font></td>";

  
//  $wait = $js['verbose_msg'];
//  $waitingmess = "Resource does not exist in the dataset";

  $redi = $js['permalink'];
  echo "<td><br> <a href=$redi>Virus Total Result</a></td>";

  
  
  

        
            if ($shits > 1 ){
                echo "<td>Positives: ";echo "<font color = 'red'> $shits </font>";echo "/";echo $js['total'];echo "</td>";
            $shitcounts = $js['positives']. "/"  .$js['total'];
            //echo $shitcounts."</td>";
             }
            else{
                echo "<td>Positives: ";echo $js['positives'];echo "/";echo $js['total']; echo "</td>";
                $shitcounts = $js['positives']. "/"  .$js['total'];
                //echo $shitcounts."</td>";
            }


  
  
  echo "<td>";
  

  
  $unratedshitcount = 0;
  
  foreach ($av as $v) { 
      if ($js['verbose_msg'] == 'Scan finished, scan information embedded in this object')
      {
     
      if (array_key_exists($v, $js['scans'])){
      
  $bool = $js['scans'][$v]['detected'];
  $aysus = $js['scans'][$v]['result'];
  $ayaw = "suspicious site";
  $unratedshit = "unrated site";


  if ($aysus === $unratedshit){
      $unratedshitcount = $unratedshitcount + 1;
  }
  else {}
  
  
  if ($bool == 1){
      echo "Detecting AV "; echo "<font color = 'green'> $v</font>"; 
      echo ' has detected shits on this site';echo "<br>";
  }else {}
  
  
  if ($aysus === $ayaw){
      echo "This has been tagged as a Suspicious site by:"; echo "<font color = 'green'> $v</font>";echo "<br>";
  }
  else {}
  
      }}
}
echo "</td>";
echo "<td>";
echo "<b><u> $unratedshitcount </u></b>";
echo "</td>";
echo "<td>";
echo $js['verbose_msg'];
echo "</td>";
//asterisk output
include_once('test.php');



//echo "<div id='1'>";

//echo "nag return domain ako ";
$returndoamain= asterisk($domain);





}

echo "<tr>";
return $returndoamain;
//echo "</table>";
}



sleep(5);


?>

</html>