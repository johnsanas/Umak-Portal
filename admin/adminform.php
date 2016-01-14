<?php include'config.php'; session_start();

$viewusers = mysqli_query($conn, "select * from tblstudents");
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
				<input type="submit" class="navibutton" name="btnusers" value="Users">
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
						Student Name
					</td>
					<td width="60">
						Position
					</td >
					<td width="60">
						College
					</td>
					<td>
						Password
					</td>
				</tr>
			</thead>
			<?php while($rows=mysqli_fetch_assoc($viewusers)){?>
			<form method="POST" >
			<tbody >
				<tr>
					<td>
						<?php echo $rows["studentID"]; ?>
					</td>
					<td>
						<?php echo $rows["studentname"];?>
					</td>
					<td>
						<?php echo $rows["position"];?>
					</td>
					<td>
						<?php echo $rows["college"];?>
					</td>
					<td>
						<?php echo $rows["password"];?>
					</td>
					<td>
						<input type="hidden" name="editdelete" value="<?php echo$rows["studentID"]?>">
						<input type="submit" name="edit" value="EDIT" class="btndelete">
					</td>
					<td>
						<input type="submit" name="delete" value="DEL" class="btndelete">
					</td>
				</tr>
			</tbody>
			</form>
			<?php }?>
		</table>

		<div class="newuser">
			<form method="POST" action="addstudent.php">
				<input type="submit" name="addnew" value="ADD NEW USER">
			</form>
		</div>
	</div> 
</div>
</body>
</html>

<?php

if(isset($_POST["delete"]))
{
	$_SESSION["editdelete"]=$_POST["editdelete"];	
	mysqli_query($conn, "delete from tblstudents where studentID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblgroupcomments where commenterID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblgroupmembers where studentID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblgrouptimeline where studentID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblonline where studentID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblprofilepictures where studentID='".$_SESSION["editdelete"]."'");
	mysqli_query($conn, "delete from tblupload where studentID='".$_SESSION["editdelete"]."'");
	header('location:adminform.php');
}
else if(isset($_POST["edit"]))
{
	$_SESSION["editdelete"]=$_POST["editdelete"];
	header('location:editstudent.php');
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