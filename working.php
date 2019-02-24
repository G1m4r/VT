<!DOCTYPE html>
<html>





<!--     
<head>
        <title>Test Loading</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            This is header
        </div>
        <div id="navigation">
            This is navigation
        </div>
        <div id="content">
            <form action=""  id="info">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td>:</td>
                        <td><input type="text" name="first_name"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>:</td>
                        <td><input type="text" name="last_name"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>:</td>
                        <td><input type="text" name="age"></td>
                    </tr>
                    <tr>
                        <td>Hobby</td>
                        <td>:</td>
                        <td><input type="text" name="hobby"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                         <td></td>

                    </tr>
                </table>
<table>
  <thead>
    <tr>
      <th rowspan="2">Name</th>
      <th rowspan="2">ID</th>
      <th colspan="2">Membership Dates</th>
      <th rowspan="2">Balance</th>
    </tr>
    <tr>
      <th>Joined</th>
      <th>Canceled</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Margaret Nguyen</td>
      <td>427311</td>
      <td><time datetime="2010-06-03">June 3, 2010</time></td>
      <td>n/a</td>
      <td>0.00</td>
    </tr>
    <tr>
      <th scope="row">Edvard Galinski</td>
      <td>533175</td>
      <td><time datetime="2011-01013">January 13, 2011</time></td>
      <td><time datetime="2017-04008">April 8, 2017</time></td>
      <td>37.00</td>
    </tr>
    <tr>
      <th scope="row">Hoshi Nakamura</td>
      <td>601942</td>
      <td><time datetime="2012-07-23">July 23, 2012</time></td>
      <td>n/a</td>
      <td>15.00</td>
    </tr>
  </tbody>
</table>
            </form>
        </div>
       <button id="submit">Submit</button>
        <div id="footer">
            This is footer
        </div>
    </body>
    
    
    <table>
  <tr>
    <th rowspan="2">Name</th>
    <th rowspan="2">ID</th>
    <th colspan="2">Membership Dates</th>
    <th rowspan="2">Balance</th>
  </tr>
  <tr>
    <th>Joined</th>
    <th>Canceled</th>
  </tr>
  <tr>
    <th>Margaret Nguyen</td>
    <td>427311</td>
    <td><time datetime="2010-06-03">June 3, 2010</time></td>
    <td>n/a</td>
    <td>0.00</td>
  </tr>
  <tr>
    <th>Edvard Galinski</td>
    <td>533175</td>
    <td><time datetime="2011-01013">January 13, 2011</time></td>
    <td><time datetime="2017-04008">April 8, 2017</time></td>
    <td>37.00</td>
  </tr>
  <tr>
    <th>Hoshi Nakamura</td>
    <td>601942</td>
    <td><time datetime="2012-07-23">July 23, 2012</time></td>
    <td>n/a</td>
    <td>15.00</td>
  </tr>
</table>
    
    
        <table border="1">
        <tr>
            <td class="addinput">
                <input type="text" id="p_new" name="data[]" value="Show in Child element 1" ><a href="#" class="addNew">Add New</a>
            </td>
        </tr>
    </table>
    <table border='1'>
        <tr>           
            <td>
                <input type="text" id="p_new_1" name="data[]" value="Show in Child element 2" ><a href="#" class="addNew">Add New</a>
            </td>
        </tr>
    </table>
    
    
     -->
    <font color = 'blue'>Single URL Search</font>
<form id="home" action="working.php" method="POST">


<input type= "text" name = "domains">
<input type= "text" name = "domains2">
<input type= "text" name = "domains3">
<input type= "text" name = "domains4">
	

       <button type="submit">Submit Single Search</button>
</form>



    
    
    <?php
    
    
    
    
    $sample1 =$_POST['domains'];
    $sample2 =$_POST['domains2'];
    $sample3 =$_POST['domains3'];
    $sample4 =$_POST['domains4'];
    
   // $domain = $_POST['domains'];
    $movies1 = array(
    
    array(
    'title' => "Rear Window",
    'director' => "Alfred Hitchcock",
    ),
    
   
    array(
    
    
    'title'=> "$sample1",
    'director'=> "$sample2",
    ),
    
    
    array(
    'title'=> "$sample3",
    'director'=>"$sample4",
    )
    
    
    
    
    );
    
    
   
    echo "<div id=1>";
    $domainqueued = "$sample1\n$sample2\n$sample3\n$sample4";
    echo $domainqueued;
    echo "</div>";
    
    
    //echo $domainqueued;
    foreach ( $movies1 as $movie ) {
        //echo $movie;
        foreach ( $movie as $key1 => $value1) {
            //echo "<div id=1>";
            
            //$domainqueued = "$domainqueued\n$key1";
            //echo "</div>";
     echo "<dt>$key1</dt><dd>$value1</dd>";;}
    }

    
 /*    $movies1 = array(
        array(
            "title" => "Rear Window",
            "director" => "Alfred Hitchcock",
            "year" => 1954,
            "set" => 19732
        )
    ); 
    
    
    foreach ( $movies1 as $movie ) {
        
       echo '<dl style="margin-bottom: 1em;"> ';
        
        foreach ( $movie as $key => $value) {
            
           // foreach ( $movie as $key => $value ) {
                
                echo "<dt>$key</dt><dd>$value</dd>";
                echo "<br>";
            
        //}
        
        echo '</dl>';
    }
    
    } */
    
    
   
    
    
    ?>
    

<button id="copyButton" onclick="myCopyFunction()">Copy.</button>
<script>
function myCopyFunction() {
  var myText = document.createElement("textarea")
  myText.value = document.getElementById("1").innerHTML;
  myText.value = myText.value.replace(/&lt;/g,"<");
  myText.value = myText.value.replace(/&gt;/g,">");
  document.body.appendChild(myText)
  myText.focus();
  myText.select();
  document.execCommand('copy');
  document.body.removeChild(myText);
 
  
}
</script>
    
    
</html>
