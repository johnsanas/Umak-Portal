  <div id="profile" class="col-sm-4 bg-color text-center" style="<?php echo $_SESSION['hide']; ?>">
		  		
		  		<div id="profile-background" style="background-color:#64b5f6; height=800px;" class="col-sm-12 img-thumbnail img-responsive text-right">
		  			<span><a href="#">hide</a></span>
		  			<div class="col-sm-12 spacer5"></div>
		  			<center>

		  					<?php 

			  					//sets the profile picture of current user
								$profile_query = "SELECT * FROM tblprofilepictures WHERE studentID = '$studentID'";
								$profile_result = mysqli_query($conn,$profile_query);

								$profile = mysqli_fetch_assoc($profile_result);

							?>
	
		  				 <div id="profile-picture" <?php echo "style='background-image: url("; ?> <?php echo 'data:image;base64,'.$profile['images'] .'' . ");'"; ?> class="col-sm-12" ></div>
		  			

		  			</center>
		  		</div>
		  		<div id="student-name"><?php echo $currentUser['Firstname'] . " " .$currentUser['Lastname'] . $profile['id'] ;?></div>
		  		<?php $_SESSION["myname"] = $currentUser['Lastname'] . " " .$currentUser['Firstname']; ?>
		  		<span id="student-number"><?php echo $currentUser['studentID']; ?></span><br>
		  		<span id="position"><?php echo $currentUser['position']; ?></span>
	</div>


   <div class="col-sm-4 bg-color sidebar-notif text-center" id="sidebar"  style="<?php echo $_SESSION['hide']; ?>">
			<div class="text-center title-background-white col-sm-11"><b>Notification</b></div>
			<div class="text-center removing-padding title-background-white col-sm-1 close-button"><a href="#">x</a></div>

		   <div id="ninja-slider">
	        <div class="slider-inner">
	            <ul>
	                <li><a href="#">
	                 	<div class="col-sm-12 bg-color text-center" id="notif">Franklin Gonzales has joined your Group <b>#MgaPogiLangs</b>
	                 	<p id="notif-date">Janaury 20, 2016 8hrs ago</p>
	                 	</div>
	                 	</a>
	                </li>
	                 <li>
	                 	<a href="#">
	                 	<div class="col-sm-12 bg-color text-center" id="notif">Nica Nina Mariano messaged you
	                 	<p id="notif-date">Janaury 20, 2016 8hrs ago</p>
	                 	</div>
	                 	</a>
	                </li>
	                 <li>
	                 	<a href="#">
	                 	<div class="col-sm-12 bg-color text-center" id="notif">John Villete messaged you<b></b>
	                 	<p id="notif-date">Janaury 20, 2016 8hrs ago</p>
	                 	</div>
	                 	</a>
	                </li>
	                 <li>
	                 	<a href="#">
	                 	<div class="col-sm-12 bg-color text-center" id="notif">Kim Justine Taligatos added you to group <b>CCS and SSG Collaboration</b>
	                 	<p id="notif-date">Janaury 20, 2016 8hrs ago</p>
	                 	</div>
	                 	</a>
	                </li>
	            </ul>
	            <div id="ninja-slider-pager">
	            	<a class="" rel="0">1</a>
	            	<a class="" rel="1">2</a>
	            	<a class="" rel="2">3</a>
	            	<a class="" rel="3">4</a>
	            </div>
	            <div class="fs-icon" title="Expand/Close"></div>
	        </div>
	    </div>
  </div>

   <div class="col-sm-4 bg-color remove-padding" id="sidebar">
  		<div class="col-sm-12 text-center remove-padding" >
  			<div  class="text-center title-background-white col-sm-11"><b>Upcoming Events</b></div>
  			<div class="text-center removing-padding title-background-white col-sm-1 close-button"><a href="#">x</a></div>
  			<div class="col-sm-12 spacer2"></div>
			<iframe src="calendar/calendar.html" frameborder="0" width="226px" height="187px" scrolling="no"></iframe>
			<!--
			<div><a href="#"><h4>On-line report of grade(Jan. 10, 2016)</h4></a></div>
			<div><a href="#"><h4>Mr. & Ms. UMak(Jan. 20, 2016)</h4></a></div>
			<div><a href="#"><h4>Certificate of Registration Printing(Feb. 12, 2016)</h4></a></div>	
			<div><a href="#"><h4>Teacher's Day(Feb. 15, 2016)</h4></a></div>
			<div><a href="#"><h4>Clash of the Bands(Feb. 28, 2016)</h4></a></div>
			<div><a href="#"><h4>University Week(March. 12, 2016)</h4></a></div>
			<div><a href="#"><h4>Graduation(March. 30, 2016)</h4></a></div>
			-->
			<div class="col-sm-12 spacer2"></div>
  		</div>
  </div>

     <div class="col-sm-4 bg-color remove-padding" id="sidebar">
  		<div class="col-sm-12 text-center remove-padding" >
  			<div  class="text-center title-background-white col-sm-11"><b>OBTL Course Plan</b></div>
  			<div class="text-center removing-padding title-background-white col-sm-1 close-button"><a href="#">x</a></div>
  			<div class="col-sm-12 spacer2"></div>
			<div class="col-sm-12">
				<p>
					 To guide you in your learning , you can download the Outcomes-Based Teaching Learning (OBTL) Course Plan from this link OBTL.
				</p>	
				 <button class="btn btn-primary btn-default btn-block" >Download OBTL Course Plan</button>
			</div>
			<div class="col-sm-12 spacer2"></div>
  		</div>
  </div>

   <div class="col-sm-4 bg-color" id="sidebar" style="<?php echo $_SESSION['display']; ?>">
  		<div class="col-sm-12">
  			<div class="center-block"  id="sidebar-logo"></div>
  			<div class="text-center"><h3>Stay connected with your classmates and friends around your campus.</h3></div>
  		</div>
  </div>


   <div class="col-sm-4 bg-color" id="sidebar" style="<?php echo $_SESSION['display']; ?>">
  		<div class="col-sm-12 text-center">
  			<div><h3>OBTL Course Plan</h3></div>

  			<span class="glyphicon glyphicon-cloud" id="cloud-icon"></span>
  			<div><h4>Store your school files in cloud and retrive anytime you want !</h4></div>
  			<!--
  			<div><i class="fa fa-user fa-lg"></i>Profile checker</div>
  			<div><i class="fa fa-user fa-lg"></i>Umak Community</div>
  			<div><i class="fa fa-user fa-lg"></i>Discuss important topics</div>
  			<div><i class="fa fa-user fa-lg"></i>Store Documents</div>
  			-->

  			<button type="button" class="btn btn-primary btn-default btn-block" >See how</button>
  		</div>
  </div>

   <div class="col-sm-4 bg-color sidebar-community" id="sidebar" style="<?php echo $_SESSION['hide']; ?>">
  		<div class="text-center removing-padding title-background-white col-sm-11"><b>Community</b></div>
  		<div class="text-center removing-padding title-background-white col-sm-1 close-button"><a href="#">x</a></div>	

  		<div class="col-sm-12">
	  		<div><h4><b>Class</b></h4>
	  			
	  		</div>
	  		<div><h4><b>Official Group Page</b></h4>
	  			College of Computer Science 6<br>
	  			Supreme Student Government 4
	  			
	  		</div>
  			<div><h4><b>Private Group</b></h4>
  				<div>
	  			<?php
	  			/*shows the list of groups user joined*/
                $viewgroups = mysqli_query($conn, "SELECT * FROM tblgroups a, tblgroupmembers b WHERE b.studentID= '".$_SESSION["studentID"]."' and b.groupID=a.groupID");

                while($rows=mysqli_fetch_assoc($viewgroups)){  ?>
                    <form method="post" > <!--no action = "" needed...already put at the bottom...see the php code below-->
                    	<div class="col-sm-11">
	                        <input type="hidden" name="groupid" value="<?php echo $rows["groupID"];?>">
	                    	<input class="group-link" type="submit" name="groupname" value="<?php echo $rows["groupname"];?>"/>
                    	</div>
                    	<div class="col-sm-1 badge">3</div>
                    </form> 
           		 <?php }?>
           		 </div>
	  			
  			</div>
  			 <div class="col-sm-12 spacer1"></div>
			</div>
  </div>




 <div class="col-sm-12 spacer10"></div>


<?php 
	
	/*gets the groupID and groupName then redirects to groups.php*/
	if(isset($_POST["groupname"])){
		$_SESSION["groupID"]=$_POST["groupid"];
		$_SESSION["groupname"]= $_POST["groupname"];
		header('location:groups.php');
	}


	function notification(){
		
	}
?>
