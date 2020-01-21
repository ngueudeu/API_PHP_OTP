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
        $mobile = $request->mobile;
	}

$mobile = stripslashes($mobile);
      
	  $sql = "SELECT id FROM userprofile WHERE mobile = '$mobile' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);	
      	
      if($count >0) {        
          //generate OTP
          $otp = rand(1000,9999);         

        $mobileNumber='+237'.$mobile.',';
        $message= 'Votre code est : '.$otp;       
      /*Start send SMS*/
        
/*$wikipediaURL = 'http://primaassurances.smsrouter.gtsmessenger.com/ws/instant.php?action=sendSMS&&login=admin&password=dfc3c668&from=PRIMA&to='.$mobile.'&message="'.$message.'"';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wikipediaURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'PRIMA');
$resultat = curl_exec ($ch);

if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
$response= "Echeque envoie de message";
}
curl_close($ch);*/
  /*End send SMS*/


$result = mysqli_query($con,"INSERT INTO otpstore(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
//$count = mysqli_num_rows($result);
$response = "bon";


         //echo $message; exit;
        //  $sms_status = sendOTP;
   //  $response= "Your Login success";
      }else {
    $response= "numéro non enregistré";
		
      }
	 
    echo json_encode( $response); 

?>

