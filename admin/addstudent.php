<?php include'config.php'; session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
<script type="text/javascript">
	
function messages()
{
	alert('Student info successfully Saved');
}

</script>	

</head>
<body>
<div class="mainbody">

	<div class="header">
	</div>

	<div class="sidenavigation">
<form method="POST">
	<table>
		<tr>
			<td>
				<input type="submit" class="navibutton" name="btnusers" value="Student Records">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" class="navibutton" name="btnip" value="IP Address">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" class="navibutton" name="btnevent" value="Event">
			</td>
		</tr>
	</table>
	</form>			
			


	</div>

	<div class="infocontaineredit">
	
		<table>
		
		<form method="post" onsubmit="return messages();">
			<tr>
				<td>
					Student ID
				</td>
				<td>
					<input type="text" name="studentID" class="txtinfo">
				</td>
			</tr>
			<tr>
				<td>
					Student Name
				</td>
				<td>
					<input type="text" name="studentname" class="txtinfo"  >
				</td>
			</tr>
			<tr>
				<td>
					Position
				</td>
				<td>
					<input type="text" name="position" class="txtinfo">
				</td>
			</tr>
			<tr>
				<td>
					College
				</td>
				<td>
					<input type="text" name="college" class="txtinfo">
				</td>
			</tr>
		
			<tr>
				<td></td>
				<td>
					<input type="submit" name="cancel" class="btninfo" value="Cancel">
					<input type="submit" name="update" class="btninfo" value="Save">
				</td>
			</tr>
			</form>
			
		</table>
	</div>
</div>
</body>
</html>

<?php

	
$alphabet = 'bcdefghijklmnopqrstuvwxyzBCDEFGHIJKLMNOPQRSTUVWXYZ123456789076543321';
$pass = array(); 
$alphaLength = strlen($alphabet) - 1; 
for ($i = 0; $i < 4; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
$password = implode($pass); 


if(isset($_POST["update"])){
$original = $_SESSION["editdelete"];
$studentID = $_POST["studentID"];
$studentname= $_POST["studentname"];
$position= $_POST["position"];
$college= $_POST["college"];
echo"<script>alert('new student successfully added');</script>";

mysqli_query($conn, "insert into tblstudents values('', '$studentID', '$studentname', '$position', '$college', '$password')");
mysqli_query($conn, "insert into tblprofilepictures values('', '$studentID', '')");
mysqli_query($conn, "insert into tblonline values('', '$studentID', 'offline')");

header('location:adminform.php');
}

?>


<?php

if(isset($_POST["btnusers"]))
{
	header('location:adminform.php');

}
else if(isset($_POST["btnip"]))
{
header('location:ip.php');	
}
else if(isset($_POST["btnevent"]))
{
header('location:event.php');	
}

?>