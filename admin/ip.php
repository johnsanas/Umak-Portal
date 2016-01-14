<?php include'config.php'; session_start();

$ip = mysqli_query($conn, "select * from tblipaddress");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
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

	<div class="infocontainer">

		<table>
			<thead>
				<tr>
					<td width="100">
						Student ID
					</td>
					<td width="190">
						IP Address
					</td>
					
				</tr>
			</thead>
		<?php while($rows=mysqli_fetch_assoc($ip)){?>
			<form method="POST" >
			<tbody>
				<tr>
					<td>
						<?php echo $rows["studentID"]; ?>
					</td>
					<td>
						<?php echo $rows["ip"];?>
					</td>
					
				</tr>
			</tbody>
			</form>
		<?php }?>	
		</table>

		
	</div> 
</div>
</body>
</html>

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