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




</html>