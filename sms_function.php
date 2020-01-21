<?php

function sendOTP($message, $otp){
	        
$wikipediaURL = 'http://primaassurances.smsrouter.gtsmessenger.com/ws/instant.php?action=sendSMS&&login=admin&password=dfc3c668&from=PRIMA&to='.$mobile.'&message="'.$message.'"';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wikipediaURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'PRIMA');
$resultat = curl_exec ($ch);
}
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
return false;
}
curl_close($ch);
return true;
?>