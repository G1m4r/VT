
<?php
function asterisk($domain){
    echo "<td>";

$pasok = $domain;

// $pasok = 'https://www.gambling.com';
    
    $fuckoffcounter = 0;
    
    
$urla = 'https://';
$urlb = 'http://';
$urld = 'https://www.';
$urlc = 'http://www.';
$urle = 'www.';
$bs = '/';

//echo "$fuckoffcounter";

//echo "$pasok";

gotostrippers:
if ($fuckoffcounter < 10) { 
    


if (\strpos($pasok, $urld) !== false) {
    $nilabas =  "*".str_replace($urld, '', $pasok)."*" ;
    $pasok = $nilabas;

    //echo "<br>";
    //echo "$nilabas";
    //echo $pasok;
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;
}
elseif (\strpos($pasok, $urlc) !== false) {
    $nilabas =  "*".str_replace($urlc, '', $pasok)."*" ;
    $pasok = $nilabas;

    //echo "$nilabas";
    //echo $pasok;
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;
}
elseif (\strpos($pasok, $urla) !== false) {
    $nilabas =  "*".str_replace($urla, '', $pasok)."*" ;
    $pasok = $nilabas;
    
    //echo "$nilabas";
    //echo $pasok;
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;
}
elseif (\strpos($pasok, $urlb) !== false) {
    $nilabas =  "*".str_replace($urlb, '', $pasok)."*" ;
    $pasok = $nilabas;
    
    //echo "$nilabas";
    //echo $pasok;
    //echo "8";
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;
}

elseif (\strpos($pasok, $urle) !== false) {
    $nilabas =  "*".str_replace($urle, '', $pasok)."*" ;
    $pasok = $nilabas;
    //echo "<br>";
    //echo "$pasok";
    
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;
    
} 


}
//sa kabila


 if (\strpos($pasok, $bs) !== false) {
     
     
     if (\strpos($pasok, '*') !== false){
         $nilabas= substr($pasok, 0, strrpos($pasok, '/'));
         /* $pasok = $nilabas."*";
         echo "dumaan ako";
         echo "$pasok";
         echo "<br>"; */
         $fuckoffcounter = $fuckoffcounter  + 1;
         //goto gotostrippers;
         
         if (\strpos($pasok, '*') !== false){
             $nilabas= substr($pasok, 0, strrpos($pasok, '/'));
             $pasok = $nilabas."*";
             /* echo "dumaan ako";
             echo "$pasok";
             echo "<br>"; */
             $fuckoffcounter = $fuckoffcounter  + 1;
             goto gotostrippers;
         
         }
                
     }
         else{
     
     $nilabas= substr($pasok, 0, strrpos($pasok, '/'));
    $pasok = "*".$nilabas."*";
    //echo "<br>";
    
    $fuckoffcounter = $fuckoffcounter  + 1;
    goto gotostrippers;}

}
else {
    if ($fuckoffcounter > 1){
echo $pasok;
        //echo "*".$pasok."*";
    }
        elseif ($fuckoffcounter == 0){
            //echo "<div id='div1'>";
            echo "*".$pasok."*";
            //echo "*dito ako papasok*";
          $pasok = "*".$pasok."*";
            //echo "</div>";
            
            
            
        }
        else { 
            $domain = $pasok;
            //echo "*dito ako papasok*";
            echo $pasok; 
            }
}

echo "</td>";

return $pasok; 

}
?>

