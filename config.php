<?php 
session_start();

if (empty($_SESSION['studentID'])){ // if there is no log in user hides feautures only for log in
	$_SESSION['studentID'] = null;
	$_SESSION['hide'] = "display:none;";
	$_SESSION['firstname'] = "";
}else { 							// shows the feature for log in
	 $_SESSION['display'] = "display:none;";
     $_SESSION['hide'] = "";
     $studentID = $_SESSION['studentID'];
}

$conn = mysqli_connect("localhost","root","","dbwebapp");
if(!$conn)
{
		die("Connection failed: ".mysqli_connect_error());
}
ob_start();

?>
