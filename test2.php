<!DOCTYPE html>
<html>
<body>

<table>

<style type="text/css">
 #nav-ask{ display:none; }
<div id="copy-text" ;  > 
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td> <? php echo $_POST['first_name']; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>:</td>
                <td><? php echo $_POST['last_name']; ?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td>:</td>
                <td><? php echo $_POST['age']; ?></td>
            </tr>
            <tr>
                <td>Hobby</td>
                <td>:</td>
                <td><? php echo $_POST['hobby']; ?></td>
            </tr>
            
          </div>   
</table>
 


</style>



</body>
</html>



            <div id="copy-text" style="float: right;" > <font color= white> copy me <?php 
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
            