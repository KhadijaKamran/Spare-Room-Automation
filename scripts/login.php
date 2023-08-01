<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST["email"]) && isset($_POST["password"])){
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://18.188.235.143:5000/login_user',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'username='.urlencode($_POST["email"]).'&password='.urlencode($_POST["password"]),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response_decoded = json_decode($response);
if($response_decoded->status=="successful"){
    //starting session
    $_SESSION["id"] = $response_decoded->id["id"];
    $_SESSION["email"] = $_POST["email"];
    header('location: ../index.php');
} else {
    session_destroy();
}


} else {
    echo "Email password not set";
}


?>