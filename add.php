<?php
include("connection.php");
$link=Connection();
$team=$_POST['team'];
$svalue=$_POST['svalue'];
$result=mysqli_query($link,"select * from iotwl");
 while($row=mysqli_fetch_array($result)){
$mobileno= $row["phoneno"];
}
 mysqli_free_result($result);

if($svalue=='0'){
$senderId = "ZENITH";
$msg = urlencode("Garbage level is EMPTY.");

$route = 4;
$postData = array(
    'mobiles' => $mobileno,
    'message' => $msg,
    'sender' => $senderId,
    'route' => $route
);

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$output = curl_exec($ch);
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
}

else if($svalue=='50'){

$senderId = "ZENITH";

$msg = urlencode("Your Water level is 50%.");

$route = 4;
$postData = array(
    'mobiles' => $mobileno,
    'message' => $msg,
    'sender' => $senderId,
    'route' => $route
);

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    ));


curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


$output = curl_exec($ch);

if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
}

else if($svalue=='100'){
	

$senderId = "ZENITH";

$msg = urlencode("Your Water level is FULL.");

$route = 4;
$postData = array(
    'mobiles' => $mobileno,
    'message' => $msg,
    'sender' => $senderId,
    'route' => $route
);

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));


curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
}


$query="update iotwl set svalue='".$svalue."' where team='".$team."'";

mysqli_query($link,$query);
mysqli_close($link);
?>

