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
        $username = $request->username;
		$mobile = $request->mobile;    

	}

$username = stripslashes($username);
$mobile = stripslashes($mobile);

$resp = array();


$sql = "INSERT INTO userprofile (nom, mobile)
VALUES ('$username', '$mobile')";


if ($con->query($sql) === TRUE) {
    $sql1 = "SELECT MAX(id)  FROM userprofile WHERE nom = '$username' and mobile = '$mobile' ";
    $result = mysqli_query($con,$sql1);

    while($row = mysqli_fetch_array($result))
    {

        array_push($resp, array(
            "id"=>$row[0]));

    }

	$response= "Registration successfull";
   
} else {
   $response= "Error:";
}
 
  
	///echo json_encode( $response);
echo json_encode(array("response"=> $response, "result"=> $resp));
 
?>