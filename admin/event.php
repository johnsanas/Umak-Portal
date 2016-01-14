<?php include'config.php'; session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
<script type="text/javascript">


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
		
		<form method="post" >
			<tr>
				<td>
					Event Name
				</td>
				<td>
					<input type="text" name="name" class="txtinfo">
				</td>
			</tr>
			<tr>
				<td>
					Location
				</td>
				<td>
					<input type="text" name="location" class="txtinfo"  >
				</td>
			</tr>
			<tr>
				<td>
					Description
				</td>
				<td>
					<input type="text" name="desc" class="txtinfo2">
				</td>
			</tr>
			
		
			<tr>
				<td></td>
				<td>
					<input type="submit" name="cancel" class="btninfo" value="Cancel">
					<input type="hidden" name="saveevent" >
					<input type="submit" name="save" class="btninfo" value="Save">
				</td>
			</tr>
			</form>
			
		</table>
	</div>
</div>
</body>
</html>

<?php
if(isset($_POST["s"]))
{
	$name = $_POST["name"];
	$location = $_POST["location"];
	$desc =  $_POST["desc"];
	mysqli_query($conn, "insert into tblevent values('', '$name', '$location', '$desc')");

	echo"<script>alert('new event successfully added');</script>";
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