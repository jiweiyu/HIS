<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import csv file</title> 
</head> 

<body> 

<?php if (!empty($_GET["success"])) { echo "<b>Your file has been imported:".$_SESSION["rowadded"]."</b><br><br>"; } //generic success notice ?> 


<form action="savecsv.php"  method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input type="hidden" name="size" value="1000000" />
  <input name="uploadcsv" type="file" id="csv" /> 
  <button class="btn btn-default" name="submitcomment" type="submit">Submit Update</button>
</form> 

</body> 
</html> 

