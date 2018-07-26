<?php

function Connection(){
$connect=mysqli_connect("localhost","root","","garbage");

return $connect;

}


?>