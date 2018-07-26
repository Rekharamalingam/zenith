<?php
include("connection.php");
$link=Connection();

$result=mysqli_query($link,"select * from iotwl");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
The Garbage level is mentioned in below

<table width="300" border="1">
  <tr>
  <td>Team</td>
    <td>Last Update</td>
	<td>Sensor Value</td>
  </tr>
  <?php
  if($result!=false){
  
  while($row=mysqli_fetch_array($result)){
  echo "<tr> <td>".$row["team"]."</td>   <td>".$row["lastupdate"]."</td>  	<td>".$row["svalue"]."</td>    </tr>";
  
  }
  mysqli_free_result($result);
  mysqli_close($link);
  }
  ?>
  
</table>



</body>
</html>
