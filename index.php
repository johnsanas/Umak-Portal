<?php 
include ('config.php');

 
  if(isset($_GET['announcement'])){
      $announcement = $_GET['announcement'];
  }else{
      $announcement = "";
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>University of Makati</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <link href="css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="js/ninja-slider.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css" >
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include('navigation.php');?>
  
<div class="container">
	<div class="col-sm-12 spacer8"></div>
	 <div class="row">
		  <div class="col-sm-8">
		  	
		  		<div class="col-sm-12 remove-padding">
			  	   		
				  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							    <div class="item active">
							      <img src="img/moto360.jpg" alt="Chania">
							      <div class="carousel-caption">
							        <h3>FEARLESS WAR FOR SUPREMACY</h3>
							        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
							      </div>
							    </div>

							    <div class="item">
							      <img src="img/course.jpg" alt="Chania">
							      <div class="carousel-caption">
							        <h3>Our New Sets of K12 Gradutes</h3>
							        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
							      </div>
							    </div>

							    <div class="item">
							      <img src="img/destiny.jpg" alt="Flower">
							      <div class="carousel-caption">
							        <h3>UMAK JOINS 115TH PHILIPPINE CIVIL SERVICE ANNIVERSARY</h3>
							        <p>Beatiful flowers in Kolymbari, Crete.</p>
							      </div>
							    </div>

							    <div class="item">
							      <img src="img/course.jpg" alt="Flower">
							      <div class="carousel-caption">
							        <h3>Our New Sets of K12 Gradutes</h3>
							        <p>Beatiful flowers in Kolymbari, Crete.</p>
							      </div>
							    </div>
						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

					<hr class="line">
			 </div>

			 <div class="col-sm-12 spacer2"></div>

			<?php 

			$view_announcements = mysqli_query($conn, "SELECT * FROM tbl_announcements ORDER BY date DESC LIMIT 3");
			while($rows=mysqli_fetch_assoc($view_announcements)){?>
				<div class="col-sm-12 spacer2"></div>
				 <div class="col-sm-12 bg-color">
				 	<div><a href="announcement.php?announcement=<?php echo $rows["ID"]; ?>"><h3><?php echo$rows["title"]; ?></h3></a></div>
				 	<p><?php echo "Posted : " . $rows["date"]; ?></p>
				 	<p><?php echo$rows["description"]; ?></p>
					<div>
						<?php echo '<img class="img-responsive" src="data:image;base64,'.$rows["announcementImage"].' ">';?>
					</div>
					<div class="col-sm-12 spacer1"></div>
				 </div>

			<?php }?>

			 
			 <div class="col-sm-12 spacer3"></div>
			 <a href="#"><div class="col-sm-12 text-center button-primary-color" id="load-more">Load More</div></a>

		  </div><!--end of body-->
		  <div class="col-sm-4 bg-color remove-padding" style="<?php echo $_SESSION['display']; ?>">
		  		<div class="bg-color-white" style="border-top:5px;" >
		  			<div class="col-sm-12 bg-color-white" id="sign_in"><a href="#">Sign in</a></div>
		  		</div>
		  		<div class="col-sm-12">
			  		<div class="col-sm-12 spacer2"></div>	
			  		<form method="POST" id="login-form"><!-- data-spy="affix" data-offset-top="234" -->
					  <div class="form-group">
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ID Number" name="username">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					  </div>
					
					  <button type="submit" id="login-button" name="btn" class="btn btn-primary btn-default btn-block" >Log in</button>
					</form>
					<div class="col-sm-12 spacer2"></div>
				</div>
		  </div>
		  
		
		
		<!--retrives sidebar-->
		<?php include('sidebar.php');?>


	</div><!--END OF ROW-->
</div><!--END OF CONTAINER-->

<div class="container-fluid bg-color">
	<div class="container">
		 <div class="row text-center">
	 		<div class="col-sm-6">
		 		<div class="remove-padding"><h3>Vision</h3></div>

		 		<p>We envision the University of Makati as the primary instrument where University education and Industry training programs interface to mold Makati youth into productive citizens and IT-enabled professionals who are exposed to the cutting edge of technology in their areas of specialization. The University shall be the final stage of Makati City's integrated primary level to university educational system that allows its less privileged citizens to compete for high paying job opportunities in its business and industries.</p>

		 	</div>
	 		<div class="col-sm-6">
				<div class="remove-padding"><h3>Mission</h3></div>

				<p>To achieve our vision, University of Makati shall mold highly competent professionals and skilled workers from the children of poor Makati residents while inculcating in them good moral values and desirable personality development by offering baccalaureate degree, graduate degree, and non-degree programs with parallel on campus social, cultural, sports and other co-curricular activities.
				</p>
	 		</div>
		</div><!--END OF ROW-->
	</div><!--END OF CONTAINER-->
</div><!--END OF CONTAINER-FLUID-->
</body>
<footer>
	<div class="container-fluid footer-bg"><!--sets the background color flexible-->
		<div class="container">	
			 <div class="row">
				<div class="col-sm-12">
					About<br>

				</div>


				<div class="col-sm-12 text-center" id="foot">
					All rights reserved
				</div>
			</div>
		</div>
	</div>
</footer>
</html>

<?php
if(isset($_POST["btn"]))
{
	$localIP = getHostByName(php_uname('n'));

	
	$student = mysqli_query($conn, "SELECT * FROM tblstudents WHERE studentID='".$_POST["username"]."' and password='".$_POST["password"]."'");
	
	echo $_POST["username"];
	 if ($student->num_rows)
	{
		$_SESSION["studentID"] = $_POST["username"];
		$studentID = $_POST["username"];
		mysqli_query($conn, "insert into tblipaddress values('', '$studentID', '$localIP')");
		header('location:index.php');
		$_SESSION["login"]="true";
		 mysqli_query($conn, "UPDATE SET status ='online' WHERE studentID='$studentID'");
	}
	else
	{
		echo"<script>alert('ID and Password not matched');</script>";
	}	
}
?>