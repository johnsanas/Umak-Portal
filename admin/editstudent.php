<?php include'config.php'; session_start();

$viewusers = mysqli_query($conn, "select * from tblstudents where studentID='".$_SESSION["editdelete"]."'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
<script type="text/javascript">
	
function messages()
{
	alert('Student info successfully updated');
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
		<?php while ($rows=mysqli_fetch_assoc($viewusers)) {?>
		<form method="post" onsubmit="return messages();">
			<tr>
				<td>
					Student ID
				</td>
				<td>
					<input type="text" name="studentID" class="txtinfo" value="<?php echo $rows["studentID"];?>">
				</td>
			</tr>
			<tr>
				<td>
					Student Name
				</td>
				<td>
					<input type="text" name="studentname" class="txtinfo"  value="<?php echo $rows["studentname"];?>">
				</td>
			</tr>
			<tr>
				<td>
					Position
				</td>
				<td>
					<input type="text" name="position" class="txtinfo"  value="<?php echo $rows["position"];?>">
				</td>
			</tr>
			<tr>
				<td>
					College
				</td>
				<td>
					<input type="text" name="college" class="txtinfo"  value="<?php echo $rows["college"];?>">
				</td>
			</tr>
			<tr>
				<td>
					Password
				</td>
				<td>
					<input type="text" name="password" class="txtinfo"  value="<?php echo $rows["password"];?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="cancel" class="btninfo" value="Cancel">
					<input type="submit" name="update" class="btninfo" value="Update">
				</td>
			</tr>
			</form>
			<?php }?>
		</table>
	</div>
</div>
</body>
</html>

<?php
if(isset($_POST["update"])){
$original = $_SESSION["editdelete"];
$studentID = $_POST["studentID"];
$studentname= $_POST["studentname"];
$position= $_POST["position"];
$college= $_POST["college"];
$password= $_POST["password"];
mysqli_query($conn, "update tblstudents set studentID='$studentID' ,studentname='$studentname' ,position='$position' ,   college ='$college' ,password='$password'  where studentID = '$original'");

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