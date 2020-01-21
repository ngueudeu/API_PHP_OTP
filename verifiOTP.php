<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
 
  require "dbconnect.php";
  
    $data = file_get_contents("php://input");
    if (isset($data)) {       
        $request = json_decode($data);        
        $otp = $request->otp;
	}

$otp = stripslashes($otp);

$sql = "SELECT * FROM otpstore WHERE otp='$otp' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 3 MINUTE)";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);      
     
    if(!empty($count)) {
        $sql = "UPDATE otpstore SET is_expired = 1 WHERE otp = '$otp'";
        $result = mysqli_query($con,$sql);

        $sql = "SELECT * FROM otpstore WHERE otp='$otp'";
        $result =  mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
        $count = mysqli_num_rows($result); 
        $response= "Your Login success";
        } else {        
        $response = "Invalid OTP!";
        } 


        echo json_encode( $response); 


?>