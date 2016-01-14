<?php 
session_start();
include 'config.php';

$_SESSION["updatemessage"]="";

if(isset($_SESSION["adminname"]))
{
	header('location:admin-panel.php');
}

?>

<html lang="en">
<head>
	<title>UMak Edu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="assets/images/umak.png" rel="shortcut icon">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">

	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-1.7.min.js"></script>
</head>

<body>
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">University of Makati</a>
    </div>
    
  </div>
</nav>



<div class="col-md-4 col-md-offset-4 marginer">
	<div class="login-container">
		<form method="POST" class="login">	
			<div class="form-group">
			    <input class="form-control input-lg" type="text" placeholder="USERNAME" name="username">
			</div>
			<div class="form-group">
			    <input class="form-control input-lg" type="password" placeholder="PASSWORD" name="password">
			</div>

			
		    <button type="submit" name="login" class="btn btn-info btn-lg btn-block" >LOGIN 
				<span class="glyphicon glyphicon-off"></span>
			</button>
		</form>		
	</div>

</div>


<?php
if(isset($_POST["login"]))
{
	$login = mysqli_query($conn, "select * from tbladmin where username='".$_POST["username"]."' and password='".$_POST["password"]."'");

	while($rows=mysqli_fetch_assoc($login))
	{
		$_SESSION["adminname"]=$rows["name"];
	}

	if($login->num_rows)
	{
		header('location:admin-panel.php');
	}
}

?>