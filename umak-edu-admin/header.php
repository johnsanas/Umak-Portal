<?php
session_start();

if(!isset($_SESSION["adminname"]))
{
  header('location:index.php');
}

    include'config.php';
	  include'counter.php';
	  include 'database-count.php';


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
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">University of Makati</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a><?php echo$_SESSION["adminname"]?></a></li>
        <li><a> Super Admin</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right ">
      	<li><a href="admin-panel.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="settings.php">Settings <span class="glyphicon glyphicon-cog"></span></a></li>
        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
